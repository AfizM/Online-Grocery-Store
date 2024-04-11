<?php
session_start();

// Check if productId is provided
if(isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    
    // Remove the item from the cart session
    unset($_SESSION['cart'][$productId]);

    // Return success response
    echo json_encode(['success' => true]);
} else {
    // Return failure response if productId is not provided
    echo json_encode(['success' => false]);
}
?>
