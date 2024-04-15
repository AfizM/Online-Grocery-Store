
<?php
session_start();

if(empty($_SESSION['cart'])) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>

