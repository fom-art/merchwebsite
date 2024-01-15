// DOM Elements
const buttonPrevious = document.getElementById('btn-previous');
const buttonNext = document.getElementById('btn-next');
const pageCount = document.getElementById('pages-count');
const gallery = document.getElementById('products-gallery');

// Initialization
fetchData(1)
updatePageCount();
setupEventListeners();
showImages();


// Event Listeners
function setupEventListeners() {
    window.addEventListener('resize', handleResize);
    buttonPrevious.addEventListener('click', goToPreviousPage);
    buttonNext.addEventListener('click', goToNextPage);
}

// Event Handlers
function handleResize() {
    perPage = calculatePerPage();
    pages = calculatePages();
    page = Math.min(page, pages);
    updatePageCount();
    showImages();
}

function goToPreviousPage() {
    if (page > 1) {
        page--;
        updateGalleryDisplay();
    }
}

function goToNextPage() {
    if (page < pages) {
        page++;
        updateGalleryDisplay();
    }
}

// Helper Functions
function calculatePerPage() {
    const screenWidth = window.innerWidth;
    if (screenWidth < 600) return 6;      // Mobile view
    if (screenWidth < 1024) return 12;    // Tablet view
    return 21;                            // Desktop view
}

function calculatePages() {
    return Math.ceil(images.length / perPage);
}

function updatePageCount() {
    pageCount.innerHTML = `Page ${page} of ${pages}`;
    buttonPrevious.disabled = (page === 1);
    buttonNext.disabled = (page === pages);
}

function updateGalleryDisplay() {
    showImages();
    updatePageCount();
}

function showImages() {
    clearGallery();
    fetchProducts(page);
}

function fetchProducts(page) {
    console.log("Hi")
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://zwa.toad.cz/~fomenart/', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            var products = JSON.parse(this.responseText);
            displayImages(products);
        }
    };
    xhr.send('page=' + page + '&perPage=' + perPage);
}

function displayImages(products) {
    products.forEach(function(product) {
        gallery.appendChild(createImageBlock(product));
    });
}

function clearGallery() {
    while (gallery.firstChild) {
        gallery.removeChild(gallery.firstChild);
    }
}

function displayImagesInRange(start, end) {
    for (let i = start; i < end; i++) {
        if (images[i]) {
            gallery.appendChild(createImageBlock(images[i]));
        }
    }
}

function createImageBlock(imageData) {
    const block = document.createElement('div');
    block.classList.add('product-card');

    const img = createImageElement(imageData.source, imageData.pathname);
    const name = createTextElement('h2', 'product-name', imageData.name);
    const price = createTextElement('h2', 'product-price', imageData.price);

    block.appendChild(img);
    block.appendChild(name);
    block.appendChild(price);
    return block;
}

function createImageElement(src, alt) {
    const img = document.createElement('img');
    img.setAttribute("src", src);
    img.setAttribute('alt', alt);

    // Add class to the image
    img.classList.add('product-image');

    return img;
}

function createTextElement(tag, className, text) {
    const element = document.createElement(tag);
    element.classList.add(className);
    element.innerText = text;
    return element;
}
