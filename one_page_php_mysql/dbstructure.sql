-- Create the database
CREATE DATABASE IF NOT EXISTS stock;

-- Select the database for use
USE stock;

-- Create the table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    total DECIMAL(12, 2) AS (unit_price * quantity) VIRTUAL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
