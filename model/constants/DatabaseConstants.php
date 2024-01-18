<?php

namespace model\constants;

/**
 * The DatabaseConstants class contains constants for configuring the database connection.
 */
class DatabaseConstants
{
    /**
     * The hostname or IP address of the database server.
     */
    public const DATABASE_HOST_NAME = "localhost";

    /**
     * The username used to authenticate with the database server.
     */
    public const DATABASE_USERNAME = "fomenart";

    /**
     * The password used to authenticate with the database server.
     */
    public const DATABASE_PASSWORD = "webove aplikace";

    /**
     * The name of the database storing user-related data.
     */
    public const USER_DATABASE_NAME = "users";

    /**
     * The name of the database storing product-related data.
     */
    public const PRODUCT_DATABASE_NAME = "products";

    /**
     * The name of the database storing purchase-related data.
     */
    public const PURCHASE_DATABASE_NAME = "purchases";
}
