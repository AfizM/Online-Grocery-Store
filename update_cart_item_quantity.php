<?php
session_start();

// Check if productId and quantity are provided
if(isset($_POST['productId'], $_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    
    // Update the quantity of the item in the cart session
    if(isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
        
        
        // Return success response
        echo json_encode(['success' => true]);
    } else {
        // Return failure response if item not found in the cart
        echo json_encode(['success' => false]);
    }
} else {
    // Return failure response if productId or quantity is not provided
    echo json_encode(['success' => false]);
}
?>
