<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'stock');
define('DB_USER', 'root');
define('DB_PASS', '');

// Establish a connection using PDO
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>
