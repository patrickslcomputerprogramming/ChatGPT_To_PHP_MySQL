<!--controller.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="blueText">Registration List</h1>
        <hr />
        <?php
        // Include db_management.php
        include 'db_management.php';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];

            //Added manually
            //Create the database structure if it doesn't exist yet
            create_database_structure();

            // Insert data into database table
            insert_data_into_table($first_name, $last_name, $email);

            //Added manually
            //Select data from the database and display them
            display_data(select_all_data());

        } else {
            // If form is not submitted, display an error message or handle as needed
            echo "<p>Error: Form not submitted</p>";
        }
        ?>
        <div id="back">
        <a href="index.php"><button id="submit1" type="submit" value="REGISTER">Try again!
                
            </button> </a>
        </div>
        
    </div>
</body>
</html>
