<?php
session_start();

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartItems = [];

    foreach($_SESSION['cart'] as $productId => $item) {
        $cartItem = [
            'productId' => $productId,
            'productName' => $item['name'],
            'productPrice' => $item['price'],
            'productImage' => $item['image'],
            'unitQuantity' => $item['unit_quantity'],
            'quantity' => $item['quantity']
        ];

        $cartItems[] = $cartItem;
    }

    echo json_encode($cartItems);
} else {
    echo json_encode([]);
}
?>
