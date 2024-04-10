<!--index.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1 class="blueText">Registration Form</h1>
    <hr>
        <form id="form1" action="controller.php" method="POST">
            <table>
                <tr>
                    <th><label for="first_name">First Name:</label></th>
                    <td><input type="text" id="first_name" name="first_name" required></td>
                </tr>
                <tr>
                    <th><label for="last_name">Last Name:</label></th>
                    <td><input type="text" id="last_name" name="last_name" required></td>
                </tr>
                <tr>
                    <th><label for="email">Email:</label></th>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <th></th>
                    <td colspan="2"><button id="submit1" type="submit" value="REGISTER">REGISTER</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
