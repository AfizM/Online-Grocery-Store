
<?php
session_start();

if(empty($_SESSION['cart'])) {
    echo json_encode(['success' => true]);
} else {
    // Return failure response if productId is not provided
    echo json_encode(['success' => false]);
}
?>

