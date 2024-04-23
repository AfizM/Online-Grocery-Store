<?php
session_start();

if(isset($_POST['productId'], $_POST['productName'], $_POST['productPrice'], $_POST['productImage'], $_POST['unitQuantity'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];
    $unitQuantity = $_POST['unitQuantity'];

    if(isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'image' => $productImage,
            'unit_quantity' => $unitQuantity,
            'quantity' => 1 
        ];
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>