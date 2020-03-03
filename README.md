# Logistics

PHP API for logistics

# Configuration

- Edit the following lines in the  the file "database_conn.php" if you want to change db details

$config = new Config([
    'username' => 'xxx',
    'password' => 'xxx',
    'database' => 'xxx',
]);

- Create table order_details in mysql db

CREATE TABLE order_details (
order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
distance VARCHAR(30) NOT NULL,
status VARCHAR(30) NOT NULL
) 

- Give value of GOOGLE_API_KEY in place_order.php


# Run the script by opening the following URL:

http://localhost:8080/logistics/Home.php
