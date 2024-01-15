#### 1. Project Overview

**Description**:

- The MerchWebsite is a dynamic web application designed as my little merch storage .

**Key Features**:

1. **Product Catalogue**: An extensive collection of merchandise items, each with detailed descriptions, images, and available customization options.
2. **Addition of products by admin users**: Feature, which allows users, who are set as admins, to add new products to the gallery.
3. **User Accounts**: Facility for users to create accounts, for more comfortable purchasing experience.


**Technology Stack**:

- **Frontend**: HTML5, CSS3, and JavaScript for a responsive and interactive user interface.
- **Backend**: PHP, ensuring robust server-side processing. 
- **Database**: MySQL, providing a reliable and scalable database solution for handling product data, user information, and order details.
---

#### 2. Technical Architecture

**Architecture Overview**:

- MerchWebsite is structured using the Model-View-Controller (MVC) architecture, which separates the application's data (Model), user interface (View), and business logic (Controller). This architecture enhances the application's scalability, maintainability, and efficiency.
**Controller**:

- The Controller layer is the intermediary between the View and the Model. It processes incoming requests from users, interacts with the Model to retrieve data, and sends the data to the View to be displayed. In MerchWebsite, controllers handle tasks like processing product customization requests, managing user inputs for order processing, and coordinating between the frontend and backend.

**Model**:

- The Model represents the application's data and business logic. It includes the structures for product data, user information, and order details. The Model layer in MerchWebsite is responsible for data retrieval, data manipulation, and business rules implementation. It interacts with the database to store and fetch data, ensuring data integrity and security.

**View**:

- The View is responsible for presenting data to the user in a readable and interactive format. It includes the HTML, CSS, and Images, templates written in PHP files that create the user interface of MerchWebsite. The View layer displays the product catalog, renders customization options, and forms the checkout process, ensuring a responsive and user-friendly experience.
---
#### 3. Code Documentation

**index.php**:

- **Role and Functionality**: The `index.php` file serves as the central entry point for the MerchWebsite application. It is the first file that gets executed when a user visits the website. This file typically initializes the application by loading the necessary configurations, setting up database connections, and handling user requests. It then directs these requests to the appropriate controllers based on the URL accessed.

**Controller Files**:

- **Purpose and Use**: Controller files in the MerchWebsite are responsible for handling user input and interactions. Each controller corresponds to a different aspect of the website. For example:
    - `ProductController`: Manages product-related requests, such as displaying the product catalog, handling product details view, and processing customization options.
    - `OrderController`: Deals with order processing, including adding items to the shopping cart, managing checkout, and order confirmation.
    - `UserController`: Handles user-related functionalities like user registration, login, profile management, and user settings. The controllers interact with the Model layer to retrieve or update data and then pass this data to the View for presentation.

**Model Files**:

- **Details and Usage**: The model files in the MerchWebsite contain the logic for the application's data structures and business rules. They interact with the database and process the data before it's sent to the controller. Key models might include:
    - `Product`: Represents the merchandise items, containing methods for retrieving product data, searching products, and handling customization details.
    - `Order`: Manages the order data, including order creation, updating order status, and maintaining order history.
    - `User`: Handles user information, authentication, and profile management. These models ensure data integrity and implement the core business logic of the application.

**View Files**:

- **Structure and Components**: View files in the MerchWebsite project are responsible for the presentation layer. They contain the HTML, CSS, and JavaScript used to display the website's content to the user. The views are separated based on different functionalities
