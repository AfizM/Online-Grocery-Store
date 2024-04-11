<?php
session_start();

// Clear the shopping cart session
unset($_SESSION['cart']);

// Return success response
echo json_encode(['success' => true]);
?>
