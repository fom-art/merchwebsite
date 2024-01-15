// DOM Elements
const buttonPrevious = document.getElementById('btn-previous');
const buttonNext = document.getElementById('btn-next');
const pageCount = document.getElementById('pages-count');
const gallery = document.getElementById('products-gallery');

class Product {
    constructor(name, price, photoPath, productType, description) {
        this.name = name;
        this.price = price;
        this.photoPath = photoPath;
        this.productType = productType;
        this.description = description;
    }
}

// Helper Functions
function calculatePerPage() {
    const screenWidth = window.innerWidth;
    if (screenWidth < 600) return 6;      // Mobile view
    if (screenWidth < 1024) return 12;    // Tablet view
    return 21;                            // Desktop view
}

function updatePageCount() {
    pageCount.innerHTML = `Page ${page} of ${totalPages}`;
    buttonPrevious.disabled = (page === 1);
    buttonNext.disabled = (page === totalPages);
}

function clearGallery() {
    gallery.innerHTML = '';
}

function createProductCard(product) {
    const card = document.createElement('div');
    card.className = 'product-card';

    card.appendChild(createImageElement(product));
    card.appendChild(createTextElement('h3', 'product-name', product.name));
    card.appendChild(createTextElement('p', 'product-price', `$${product.price}`));
    card.appendChild(createTextElement('p', 'product-type', product.productType));
    card.appendChild(createTextElement('p', 'product-description', product.description));

    return card;
}

function createImageElement(product) {
    const img = document.createElement('img');
    console.log("Product: " + product);
    img.src = product.photoPath;
    img.alt = product.name;
    img.className = 'product-image';
    return img;
}

function createTextElement(elementType, className, text) {
    const element = document.createElement(elementType);
    element.className = className;
    element.textContent = text;
    return element;
}

function appendCardToGallery(card) {
    gallery.appendChild(card);
}

function showImages() {
    clearGallery();
    products.forEach(product => {
        const card = createProductCard(product);
        appendCardToGallery(card);
    });
}


function setupEventListeners() {
    window.addEventListener('resize', handleResize);
    buttonPrevious.addEventListener('click', goToPreviousPage);
    buttonNext.addEventListener('click', goToNextPage);
}

function fetchData(page, perPage) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "https://zwa.toad.cz/~fomenart/", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);

                if (response.totalPages) {
                    totalPages = response.totalPages;
                    updatePageCount();
                }

                if (response.products && Array.isArray(response.products)) {
                    // Clear the previous products array
                    products = [];

                    // Add each product from the response to the products array
                    response.products.forEach(productData => {
                        const product = new Product(
                            productData.productName,
                            productData.productPrice,
                            productData.productPhotoPath,
                            productData.productType,
                            productData.productDescription
                        );
                        products.push(product);
                    });

                    //Update the display with new data
                    showImages();
                }
            } catch (e) {
                console.error("Error parsing JSON:", e);
            }
        } else {
            console.error("Request failed. Status:", xhr.status);
        }
    };

    xhr.onerror = function () {
        console.error("Request failed.");
    };

    xhr.send("page=" + page.toString() + "&perPage=" + perPage.toString());
}

// Event Handlers
function handleResize() {
    perPage = calculatePerPage();
    fetchData(1, perPage)
}

function goToPreviousPage() {
    if (page > 1) {
        page--;
        fetchData(page, perPage)
    }
}

function goToNextPage() {
    if (page < totalPages) {
        page++;
        fetchData(page, perPage)
    }
}

// Initialization
let page = 1;
let perPage = calculatePerPage();
let totalPages;
let products = [];

fetchData(page, perPage);
updatePageCount();
setupEventListeners();
showImages();
