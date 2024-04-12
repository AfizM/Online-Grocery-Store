<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'afiz', '1234', 'grocerystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

// Check if productId and quantity are provided
if(isset($_POST['productId'], $_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    
    // Query the database to get the available quantity of the product
    $sql = "SELECT in_stock FROM products WHERE product_id = $productId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $availableQuantity = $row['in_stock'];

        // Check if the quantity in the cart is less than or equal to the available quantity
        if ($quantity <= $availableQuantity) {
            // Update the quantity in the database
            $newQuantity = $availableQuantity - $quantity;
            $updateSql = "UPDATE products SET in_stock = $newQuantity WHERE product_id = $productId";
            if (mysqli_query($conn, $updateSql)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update quantity in the database']);
            }
        } else {
            // Return false if quantity is not available
            echo json_encode(['success' => false, 'message' => 'Requested quantity exceeds available quantity']);
        }
    } else {
        // Return false if product is not found
        echo json_encode(['success' => false, 'message' => 'Product not found']);
    }
} else {
    // Return false if productId or quantity is not provided
    echo json_encode(['success' => false, 'message' => 'Missing productId or quantity']);
}

// Close the database connection
mysqli_close($conn);


?>
