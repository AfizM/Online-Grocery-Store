<?php
session_start();

$conn = mysqli_connect('localhost', 'afiz', '1234', 'grocerystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

if(isset($_POST['productId'], $_POST['quantity'])) {
    
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    
    $sql = "SELECT in_stock FROM products WHERE product_id = $productId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $availableQuantity = $row['in_stock'];

        if ($quantity <= $availableQuantity) {
            $newQuantity = $availableQuantity - $quantity;
            $updateSql = "UPDATE products SET in_stock = $newQuantity WHERE product_id = $productId";
            if (mysqli_query($conn, $updateSql)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

mysqli_close($conn);
?>
