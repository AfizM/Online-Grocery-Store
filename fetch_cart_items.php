<?php
session_start();

// Check if cart items exist in the session
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Initialize an empty array to store cart items
    $cartItems = [];

    // Loop through each cart item in the session
    foreach($_SESSION['cart'] as $productId => $item) {
        // Create an associative array representing the cart item
        $cartItem = [
            'productId' => $item['product_id'],
            'productName' => $item['name'],
            'productPrice' => $item['price'],
            'productImage' => $item['image'],
            'unitQuantity' => $item['unit_quantity'],
            'quantity' => $item['quantity']
        ];

        // Add the cart item to the array
        $cartItems[] = $cartItem;
    }

    // Return the cart items array as JSON
    echo json_encode($cartItems);
} else {
    // If cart is empty, return an empty array as JSON
    echo json_encode([]);
}
?>
