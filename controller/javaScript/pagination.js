const images = generateSampleImages();

function generateSampleImages() {
    const sampleImages = [];
    for (let i = 0; i < 27; i++) {
        sampleImages.push({ name: "Stickerpack Mobile Legends", source: "view/images/stickerpack1.png", price: "3$" });
        sampleImages.push({ name: "Genshin Key Chain", source: "view/images/randomMerch.jpg", price: "3$" });
    }
    return sampleImages;
}

// DOM Elements
const buttonPrevious = document.getElementById('btn-previous');
const buttonNext = document.getElementById('btn-next');
const pageCount = document.getElementById('pages-count');
const gallery = document.getElementById('products-gallery');

// Initialization
let page = 1;
let perPage = calculatePerPage();
let pages = calculatePages();
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
    const offset = (page - 1) * perPage;
    displayImagesInRange(offset, offset + perPage);
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

    const img = createImageElement(imageData.source, imageData.name);
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