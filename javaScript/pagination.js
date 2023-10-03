let buttonPrevious = document.getElementById('btn-previous');
let buttonNext = document.getElementById('btn-next');
let pageCount = document.getElementById('pages-count');
let gallery = document.getElementById('products-gallery');

let images = [];
for (var i = 0; i < 27; i++) {
    images.push({
        name: "Stickerpack Mobile Legends",
        source: "images/stickerpack1.png",
        price: "3$",
    });
    images.push({
        name: "Stickerpack Genshin Impact Inazuma Edition",
        source: "images/stickerpack2.png",
        price: "4.5$",
    });
}
let perPage = 8;
let page = 1;
let pages = Math.ceil(images.length / perPage);

buttonPrevious.addEventListener('click', goToPreviousPage);
buttonNext.addEventListener('click', goToNextPage);

function goToPreviousPage() {
    if (page === 1) {
        page = 1;
    } else {
        page--;
        showImages();
    }
}

function goToNextPage() {
    if (page === pages) {
        page = pages;
    } else {
        page++;
        showImages();
    }
}

function showImages() {
    while (gallery.firstChild) gallery.removeChild(gallery.firstChild)

    let offset = (page - 1)  * perPage;


    for (let i = offset; i < offset + perPage; i++) {
        if (images[i]) {
            let block = document.createElement('div');
            let img = document.createElement('img');
            let name = document.createElement('h2');
            let price = document.createElement('h2');

            block.classList.add('product-card')

            img.setAttribute("src", images[i].source);
            img.setAttribute('alt', images[i].name);

            name.classList.add('product-name')

            price.classList.add('product-price')

            name.innerText = images[i].name;
            price.innerText = images[i].price;
            block.appendChild(img);
            block.appendChild(name);
            block.appendChild(price);
            gallery.appendChild(block);
        }
    }

    pageCount.innerHTML = "Page " + page + " of " + pages;
}

showImages();