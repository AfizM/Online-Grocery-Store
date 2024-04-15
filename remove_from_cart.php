<?php
session_start();

if(isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    unset($_SESSION['cart'][$productId]);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
