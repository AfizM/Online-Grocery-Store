<?php
session_start();

if(isset($_POST['productId'], $_POST['quantity'])) {

    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    if($quantity > 0) {
        if(isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
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
?>
