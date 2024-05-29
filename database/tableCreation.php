<?php

// Create tables if they do not exist
$table_creation_sql = "
CREATE TABLE IF NOT EXISTS customer_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    dateofbirth DATE NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    postcode VARCHAR(255) NOT NULL,
    street1 VARCHAR(255) NOT NULL,
    street2 VARCHAR(255),
    payment VARCHAR(255) NOT NULL,
    car_name VARCHAR(255) NOT NULL
);
ALTER TABLE customer_info ADD COLUMN car_name VARCHAR(255);

";

if ($conn->query($table_creation_sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}






?>