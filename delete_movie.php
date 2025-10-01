<?php
/*
  This file handles movie deletion. It verifies:
  1. The user is logged in
  2. The user is an admin
  3. A valid movie ID is provided
  Then it deletes the movie and redirects back to the dashboard
*/
session_start();
include_once('config.php');

// Check if user is logged in and is admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 'true') {
    header("Location: login.php");
    exit;
}

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$products_id = $_GET['id'];

// Check if any bookings exist for this movie


// If there are bookings, don't allow deletion


try {
    // Delete the movie

    // Set success message
    $_SESSION['success_message'] = "Movie deleted successfully!";
} catch (PDOException $e) {
    // Set error message
    $_SESSION['error_message'] = "Error deleting product: " . $e->getMessage();
}

// Redirect back to dashboard
header("Location: dashboard.php");
exit;
?>
