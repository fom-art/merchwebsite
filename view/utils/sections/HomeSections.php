<?php

namespace view\utils\sections;
use HrefsConstants;
use Icons;
use model\models\Product;

require_once __DIR__ . '/../Icons.php';
require_once __DIR__ . '/../HrefsConstants.php';


class HomeSections
{
    public static function renderHeader($isRegistered, $isAdmin): void
    {
        ?>
        <header>
            <div class="header-block">
                <div class="title-block">
                    <h1 class="title">ANFO</h1>
                </div>
                <div class="icons-header-row-block">
                    <?php
                    if ($isAdmin) {
                        Icons::printAdminIcon(HrefsConstants::ADMIN, "add-product-button");
                    }
                    Icons::printUserLoginIcon($isRegistered ? HrefsConstants::USER : HrefsConstants::SIGN_IN,
                        $isRegistered ? "check-user-details-button" : "log-in-button");
                    Icons::printPurchaseIcon(HrefsConstants::PURCHASE, "purchase-icon");
                    ?>
                </div>
            </div>
        </header>
        <?php
    }

    public static function renderNavigation()
    {
        ?>
        <div class="navigation-block">
            <!-- Navigation Menu -->
            <ul class="navigation-list">
                <li><a href="#products-gallery">Home</a></li>
                <li><a href="#products-gallery">All Products</a></li>
                <li><a href="#products-gallery">Stickers</a></li>
            </ul>
        </div>
        <?php
    }

    public static function renderMainContent($products)
    {
        ?>
        <main id="image-gallery">
            <!-- Product Gallery -->
            <div id="products-gallery" class="gallery-block">
                <!-- Gallery content goes here -->
                <?php
                    foreach ($products as $product) {
                        self::renderProductCard($product);
                    }
                ?>
            </div>

            <!-- Gallery Pagination -->
            <div class="gallery-mechanic">
                <div id="button-previous" class="icon-block">
                    <button class="pagination-button" id="btn-previous" type="button">&lt;</button>
                </div>
                <div id="pages-count"></div>
                <div id="button-next" class="icon-block">
                    <button class="pagination-button" id="btn-next" type="button">&gt;</button>
                </div>
            </div>
        </main>
        <?php
    }

    public static function renderFooter()
    {
        ?>
        <footer>
            <div class="footer-block">
                <div class="social-media-block">
                    <h3>Social Media</h3>
                    <a href="https://www.instagram.com/anfo_art/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                             viewBox="-100.7682 -167.947 873.3244 1007.682">
                            <title>Instagram Account</title>
                            <g fill="#ffffff">
                                <path d="M335.895 0c-91.224 0-102.663.387-138.49 2.021-35.752 1.631-60.169 7.31-81.535 15.612-22.088 8.584-40.82 20.07-59.493 38.743-18.674 18.673-30.16 37.407-38.743 59.495C9.33 137.236 3.653 161.653 2.02 197.405.386 233.232 0 244.671 0 335.895c0 91.222.386 102.661 2.02 138.488 1.633 35.752 7.31 60.169 15.614 81.534 8.584 22.088 20.07 40.82 38.743 59.495 18.674 18.673 37.405 30.159 59.493 38.743 21.366 8.302 45.783 13.98 81.535 15.612 35.827 1.634 47.266 2.021 138.49 2.021 91.222 0 102.661-.387 138.488-2.021 35.752-1.631 60.169-7.31 81.534-15.612 22.088-8.584 40.82-20.07 59.495-38.743 18.673-18.675 30.159-37.407 38.743-59.495 8.302-21.365 13.981-45.782 15.612-81.534 1.634-35.827 2.021-47.266 2.021-138.488 0-91.224-.387-102.663-2.021-138.49-1.631-35.752-7.31-60.169-15.612-81.534-8.584-22.088-20.07-40.822-38.743-59.495-18.675-18.673-37.407-30.159-59.495-38.743-21.365-8.302-45.782-13.981-81.534-15.612C438.556.387 427.117 0 335.895 0zm0 60.521c89.686 0 100.31.343 135.729 1.959 32.75 1.493 50.535 6.965 62.37 11.565 15.68 6.094 26.869 13.372 38.622 25.126 11.755 11.754 19.033 22.944 25.127 38.622 4.6 11.836 10.072 29.622 11.565 62.371 1.616 35.419 1.959 46.043 1.959 135.73 0 89.687-.343 100.311-1.959 135.73-1.493 32.75-6.965 50.535-11.565 62.37-6.094 15.68-13.372 26.869-25.127 38.622-11.753 11.755-22.943 19.033-38.621 25.127-11.836 4.6-29.622 10.072-62.371 11.565-35.413 1.616-46.036 1.959-135.73 1.959-89.694 0-100.315-.343-135.73-1.96-32.75-1.492-50.535-6.964-62.37-11.564-15.68-6.094-26.869-13.372-38.622-25.127-11.754-11.753-19.033-22.943-25.127-38.621-4.6-11.836-10.071-29.622-11.565-62.371-1.616-35.419-1.959-46.043-1.959-135.73 0-89.687.343-100.311 1.959-135.73 1.494-32.75 6.965-50.535 11.565-62.37 6.094-15.68 13.373-26.869 25.126-38.622 11.754-11.755 22.944-19.033 38.622-25.127 11.836-4.6 29.622-10.072 62.371-11.565 35.419-1.616 46.043-1.959 135.73-1.959"/>
                                <path d="M335.895 447.859c-61.838 0-111.966-50.128-111.966-111.964 0-61.838 50.128-111.966 111.966-111.966 61.836 0 111.964 50.128 111.964 111.966 0 61.836-50.128 111.964-111.964 111.964zm0-284.451c-95.263 0-172.487 77.224-172.487 172.487 0 95.261 77.224 172.485 172.487 172.485 95.261 0 172.485-77.224 172.485-172.485 0-95.263-77.224-172.487-172.485-172.487m219.608-6.815c0 22.262-18.047 40.307-40.308 40.307-22.26 0-40.307-18.045-40.307-40.307 0-22.261 18.047-40.308 40.307-40.308 22.261 0 40.308 18.047 40.308 40.308"/>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="copyright-block">
                    <a href="homePage.php" target="_blank">
                        <h3>©ANFO</h3>
                    </a>
                </div>
            </div>
        </footer>
        <?php
    }

    public static function renderScripts()
    {
        ?>
        <script src="<?php echo HrefsConstants::PAGINATION_SCRIPT ?>"></script>
        <?php
    }

    private static function renderProductCard(Product $product): void
    {
        $productName = htmlspecialchars($product->getProductName());
        $productPrice = htmlspecialchars($product->getProductPrice());
        $productPhotoPath = htmlspecialchars($product->getProductPhotoPath());


        echo "<div class='product-card'>";
        echo "<img src='$productPhotoPath' alt='$productName' class='product-image'>";
        echo "<h2 class='product-name'>$productName</h2>";
        echo "<h2 class='product-price'>$productPrice</h2>";
        echo "</div>";
    }
}