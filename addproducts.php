<?php
session_start();
include_once('config.php');

// Redirect if not admin
if (empty($_SESSION['username']) || $_SESSION['is_admin'] != 'true') {
    header("Location: login.php");
    exit;
}

// Handle form submission
if (isset($_POST['submit'])) {
    $products_name = $_POST['products_name'];
    $products_desc = $_POST['products_desc'];
    $products_quality = $_POST['products_quality'];
    $products_rating = $_POST['products_rating'];
    $products_image = $_POST['products_image'];
    $products_price = $_POST['products_price'];

    if (empty($products_name) || empty($products_desc) || empty($products_quality) || empty($products_rating) || empty($products_price)) {
        $error = "Please fill in all required fields.";
    } else {
        $sql = "INSERT INTO products (products_name, products_desc, products_quality, products_rating, products_image, products_price) 
                VALUES (:products_name, :products_desc, :products_quality, :products_rating, :products_image, :products_price)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':products_name', $products_name);
        $stmt->bindParam(':products_desc', $products_desc);
        $stmt->bindParam(':products_quality', $products_quality);
        $stmt->bindParam(':products_rating', $products_rating);
        $stmt->bindParam(':products_image', $products_image);
        $stmt->bindParam(':products_price', $products_price);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Product added successfully!";
            header("Location: list_products.php");
            exit;
        } else {
            $error = "Failed to add product.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product | Trimis E-Commerce</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
    }
    .container {
        max-width: 600px;
        margin-top: 50px;
        padding: 20px;
        background-color: #1e1e1e;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }
    .form-control, .form-select {
        background-color: #2c2c2c;
        color: #fff;
        border: 1px solid #555;
    }
    .form-control:focus {
        background-color: #2c2c2c;
        color: #fff;
        border-color: #1976d2;
        box-shadow: none;
    }
    .btn-primary {
        background-color: #1976d2;
        border: none;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #0d47a1;
    }
    .alert {
        background-color: #333;
        color: #fff;
        border: none;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="mb-4 text-center">Add New Product</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="products_name" class="form-label">Product Name</label>
            <input type="text" name="products_name" id="products_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="products_desc" class="form-label">Description</label>
            <textarea name="products_desc" id="products_desc" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="products_quality" class="form-label">Quality</label>
            <select name="products_quality" id="products_quality" class="form-select" required>
                <option value="">Select Quality</option>
                <option value="2D">2D</option>
                <option value="3D">3D</option>
                <option value="4D">4D</option>
                <option value="6D">6D</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="products_rating" class="form-label">Rating (1-10)</label>
            <input type="number" name="products_rating" id="products_rating" class="form-control" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="products_image" class="form-label">Image Filename</label>
            <input type="text" name="products_image" id="products_image" class="form-control" placeholder="example.jpg">
        </div>

        <div class="mb-3">
            <label for="products_price" class="form-label">Price (€)</label>
            <input type="number" name="products_price" id="products_price" class="form-control" step="0.01" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="list_products.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
