<?php
session_start();

// Check if the necessary parameters are provided
if(isset($_POST['productId'], $_POST['productName'], $_POST['productPrice'], $_POST['productImage'], $_POST['unitQuantity'])) {
    // Extract the parameters
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];
    $unitQuantity = $_POST['unitQuantity'];

    // Check if the product is already in the cart
    if(isset($_SESSION['cart'][$productId])) {
        // Increment the quantity if the product is already in the cart
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // Add the product to the cart
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'image' => $productImage,
            'unit_quantity' => $unitQuantity,
            'quantity' => 1 // Default quantity is 1
        ];
    }

    // Return a response indicating success
    echo json_encode(['success' => true]);
} else {
    // Return a response indicating failure if the necessary parameters are not provided
    echo json_encode(['success' => false]);
}

?>