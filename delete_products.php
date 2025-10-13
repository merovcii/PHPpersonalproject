<?php

session_start();
include_once('config.php');


if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 'true') {
    header("Location: login.php");
    exit;
}


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$products_id = $_GET['id'];



try {


    $_SESSION['success_message'] = "Product deleted successfully!";
} catch (PDOException $e) {
    
    $_SESSION['error_message'] = "Error deleting product: " . $e->getMessage();
}


header("Location: dashboard.php");
exit;
?>
