<?php
include_once('config.php');
session_start();

// Check admin
if (empty($_SESSION['username']) || $_SESSION['is_admin'] != 'true') {
    header("Location: login.php");
    exit;
}

// Get product ID
if (!isset($_GET['id'])) {
    header("Location: list_products.php");
    exit;
}

$id = $_GET['id'];

// Fetch product details
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found!");
}

// Update product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['products_name'];
    $desc = $_POST['products_desc'];
    $quality = $_POST['products_quality'];
    $rating = $_POST['products_rating'];
    $image = $_POST['products_image'];
    $price = $_POST['products_price'];

    $update = $conn->prepare("UPDATE products SET products_name=?, products_desc=?, products_quality=?, products_rating=?, products_image=?, products_price=? WHERE id=?");
    $update->execute([$name, $desc, $quality, $rating, $image, $price, $id]);

    header("Location: list_products.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #121212; color: #e0e0e0; }
    .card { background-color: #1e1e1e; border: none; }
    .form-control { background-color: #2c2c2c; color: white; border: none; }
    .btn-primary { background-color: #1976d2; border: none; }
    .btn-primary:hover { background-color: #0d47a1; }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card p-4" style="width: 400px;">
  <h3 class="text-center mb-4">Edit Product</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="products_name" class="form-control" value="<?= htmlspecialchars($product['products_name']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <input type="text" name="products_desc" class="form-control" value="<?= htmlspecialchars($product['products_desc']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Quality</label>
      <input type="text" name="products_quality" class="form-control" value="<?= htmlspecialchars($product['products_quality']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Rating</label>
      <input type="number" name="products_rating" class="form-control" value="<?= htmlspecialchars($product['products_rating']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Image Link</label>
      <input type="text" name="products_image" class="form-control" value="<?= htmlspecialchars($product['products_image']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Price (€)</label>
      <input type="number" step="0.01" name="products_price" class="form-control" value="<?= htmlspecialchars($product['products_price']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
    <a href="list_products.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
  </form>
</div>

</body>
</html>
