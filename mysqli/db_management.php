<?php

// Include database configuration
include 'db_config.php';

// Function to connect to MySQL database via MySQLi
function connect_to_database() {
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to make the database table available for use
function make_table_available($conn) {
    $sql = "USE " . DB_DATABASE;
    $conn->query($sql);
}

// Function to run query that includes a result set
function run_query_with_result($conn, $sql) {
    $result = $conn->query($sql);
    return $result;
}

// Function to run query that does not include a result set
function run_query_without_result($conn, $sql) {
    if ($conn->multi_query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to disconnect from MySQL database
function disconnect_from_database($conn) {
    $conn->close();
}

// Function to create database structure if it doesn't exist yet
function create_database_structure() {
    $conn = connect_to_database();
    $sql = file_get_contents("db_structure.sql");
    if (run_query_without_result($conn, $sql)) {
        //echo "Database structure created successfully";
    } else {
        echo "Error creating database structure: " . $conn->error;
    }
    disconnect_from_database($conn);
}

// Function to insert data collected from form into database table
function insert_data_into_table($first_name, $last_name, $email) {
    $conn = connect_to_database();
    make_table_available($conn);
    $sql = "INSERT INTO " . DB_TABLE . " (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
    if (run_query_without_result($conn, $sql)) {
        //echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
    disconnect_from_database($conn);
}

// Function to select and save all existing data in database table
function select_all_data() {
    $conn = connect_to_database();
    make_table_available($conn);
    $sql = "SELECT * FROM " . DB_TABLE;
    $result = run_query_with_result($conn, $sql);
    disconnect_from_database($conn);
    return $result;
}

function display_data($result) {
    if ($result && $result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data available";
    }
}


?>
