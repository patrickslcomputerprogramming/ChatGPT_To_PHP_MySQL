<?php
// Include the database configuration
require_once 'config/database.php';

// Function to insert data into the database
function insertProduct($productName, $unitPrice, $quantity, $pdo)
{
    $query = 'INSERT INTO products (product_name, unit_price, quantity) VALUES (:product_name, :unit_price, :quantity)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_name', $productName);
    $stmt->bindParam(':unit_price', $unitPrice);
    $stmt->bindParam(':quantity', $quantity);
    return $stmt->execute();
}

// Function to fetch all products from the database
function fetchAllProducts($pdo)
{
    $query = 'SELECT * FROM products';
    return $pdo->query($query)->fetchAll();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = htmlspecialchars($_POST['product_name']);
    $unitPrice = floatval($_POST['unit_price']);
    $quantity = intval($_POST['quantity']);

    if (insertProduct($productName, $unitPrice, $quantity, $pdo)) {
        echo "Product added successfully!";
    } else {
        echo "Failed to add product!";
    }
}

// Fetch existing products from the database
$products = fetchAllProducts($pdo);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Form</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h1>Product Form</h1>

    <!-- Form to submit data -->
    <form method="POST" action="">
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" required>
        </div>
        <div>
            <label for="unit_price">Unit Price:</label>
            <input type="number" name="unit_price" id="unit_price" step="0.01" required>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
        </div>
        <button type="submit">Add Product</button>
    </form>

    <!-- Display existing products -->
    <h2>Existing Products</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                <td><?php echo number_format($product['unit_price'], 2); ?></td>
                <td><?php echo intval($product['quantity']); ?></td>
                <td><?php echo number_format($product['total'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
