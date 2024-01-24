// Declare DOM elements in the global scope
let buttonPrevious, buttonNext, pageCount;

// DOM Elements setup function
function setupDOMElements() {
    buttonPrevious = document.getElementById('btn-previous');
    buttonNext = document.getElementById('btn-next');
    pageCount = document.getElementById('pages-count');
    setupEventListeners();
}


// Initialize global variables
let page = getPage();
let totalPages = 1;
let perPage = getPerPage();

function getPage() {
    const urlPage = parseInt(new URLSearchParams(window.location.search).get('page'));
    return !isNaN(urlPage) ? urlPage : 1;
}

function getPerPage() {
    const urlPerPage = parseInt(new URLSearchParams(window.location.search).get('perPage'));
    return !isNaN(urlPerPage) ? urlPerPage : calculatePerPage();
}

// Helper Functions
function calculatePerPage() {
    const screenWidth = window.innerWidth;
    if (screenWidth < 600) return 6;      // Mobile view
    if (screenWidth < 1024) return 12;    // Tablet view
    return 21;                            // Desktop view
}

function updatePageCount() {
    buttonPrevious.disabled = (page <= 1);
    console.log(parseInt(page) === parseInt(totalPages))
    buttonNext.disabled = (page >= parseInt(totalPages));
}

function updateQueryStringParameter(key, value) {
    const baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    const urlSearchParams = new URLSearchParams(window.location.search);
    urlSearchParams.set(key, value);
    const newUrl = baseUrl + "?" + urlSearchParams.toString();
    window.history.pushState({path: newUrl}, '', newUrl);
}

function setupEventListeners() {
    window.addEventListener('resize', handleResize);
    buttonPrevious.addEventListener('click', goToPreviousPage);
    buttonNext.addEventListener('click', goToNextPage);
    console.log("Here")
}

function fetchData(page, perPage) {
    const xhr = new XMLHttpRequest();
    const url = `https://zwa.toad.cz/~fomenart/?page=${page}&perPage=${perPage}`;

    xhr.open("GET", url, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                document.body.innerHTML = "";
                document.body.innerHTML = xhr.responseText;
                setupDOMElements()
                fetchPagesAmount(page, perPage)
            } catch (e) {
                console.error("Error parsing:", e);
            }
        } else {
            console.error("Request failed. Status:", xhr.status);
        }};

    xhr.onerror = function () {
        console.error("Request failed.");
    };

    xhr.send("page=" + page.toString() + "&perPage=" + perPage.toString());
}

function fetchPagesAmount(page, perPage) {
    const xhr = new XMLHttpRequest();
    const url = `https://zwa.toad.cz/~fomenart/index.php/pagesAmount/?page=${page}&perPage=${perPage}`;

    xhr.open("GET", url, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                totalPages = xhr.responseText; // Assuming the response is just the total pages count
                updatePageCount(); // Update the page count display
            } catch (e) {
                console.error("Error parsing:", e);
            }
        } else {
            console.error("Request failed. Status:", xhr.status);
        }
    };

    xhr.onerror = function () {
        console.error("Request failed.");
    };

    xhr.send();
}


// Event Handlers
function handleResize() {
    perPage = calculatePerPage();
    // updateLocalStorage();
    updateQueryStringParameter('page', page)
    updateQueryStringParameter('perPage', perPage)
    fetchData(1, perPage)
}

function goToPreviousPage() {
    console.log(page, totalPages)
    if (page !== 1) {
        console.log("Click")
        page--;
        // updateLocalStorage();
        updateQueryStringParameter('page', page)
        updateQueryStringParameter('perPage', perPage)
        fetchData(page, perPage)
    }
}

function goToNextPage() {
    console.log(page, totalPages)
    if (page !== totalPages) {
        console.log("Click")
        page++;
        // updateLocalStorage();
        updateQueryStringParameter('page', page)
        updateQueryStringParameter('perPage', perPage)
        fetchData(page, perPage);
    }
}

setupDOMElements()
fetchData(page, perPage);
updatePageCount();
setupEventListeners();
