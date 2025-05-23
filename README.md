# b2-rattrapages-Theo-Jublou

Description
This PHP-based web application provides a platform for customers to:

Create customized salads by selecting a base and 4 ingredients
Place orders with their contact information
Track the status of their orders
And for restaurant staff to:

View all incoming orders
Update order statuses (In Progress, Completed, Cancelled)
Features
Customer Order Form: Complete form to create personalized salads with customer information
Order Management: Administrative interface to view and update order statuses
Responsive Design: User-friendly interface that works on various device sizes
Database Storage: All orders are stored in a MySQL database
Installation
Clone the repository:

Set up a local web server with PHP support (like XAMPP, WAMP, or Laragon)

Place the project files in your web server's document root folder

Create the database using either:

The setup.sql file
OR let the application create it automatically on first run
Configure database connection in db.php if needed (default credentials are used)

Usage
Access the application through your web browser:

Navigate using the menu:

Accueil (Home): Welcome page
Commander (Order): Fill out the form to place an order
Liste des commandes (Order List): View and manage existing orders
To place an order:

Fill in personal details (name, email, address, phone)
Select a salad base
Choose 4 ingredients
Submit the form
To manage orders:

Go to the "Liste des commandes" page
Use the dropdown menu to update order status
Click "Mettre à jour" to save changes
Technologies Used
PHP 7+
MySQL
HTML5
CSS3
JavaScript
Database Structure
The application uses a single table named commandes with the following structure:

id: Auto-incremented primary key
nom: Customer's last name
prenom: Customer's first name
email: Customer's email address
adresse: Delivery/pickup address
telephone: Contact phone number
prix: Order price (automatically generated)
statut: Order status (default: "Commande prise en compte")
date_creation: Timestamp of order creation


Video Link: https://youtu.be/AC4jimNHUUo
