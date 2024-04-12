
<?php
session_start();

if(isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
    echo json_encode(['success' => true]);
} else {
    // Return failure response if productId is not provided
    echo json_encode(['success' => false]);
}
?>

