-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS user_registration_db;

-- Use the created database
USE user_registration_db;

-- Create table if it doesn't exist
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);
