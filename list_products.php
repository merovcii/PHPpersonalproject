<?php
session_start();
include_once('config.php');

// Redirect if not admin
if (empty($_SESSION['username']) || $_SESSION['is_admin'] != 'true') {
    header("Location: login.php");
    exit;
}

// Fetch products
$sql_products = "SELECT * FROM products";
$select_products = $conn->prepare($sql_products);
$select_products->execute();
$products_data = $select_products->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trimis E-Commerce | Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #121212;
      color: #e0e0e0;
    }
    .navbar {
      background-color: #1f1f1f;
    }
    .sidebar {
      background-color: #1c1c1c;
      height: 100vh;
    }
    .sidebar .nav-link {
      color: #aaa;
    }
    .sidebar .nav-link.active {
      background-color: #333;
      color: #fff;
    }
    .sidebar .nav-link:hover {
      color: #fff;
    }
    .table-container {
      background-color: #1e1e1e;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }
    .table-container table th,
    .table-container table td {
      color: #ffffff !important;
    }
    .table thead {
      background-color: #2c2c2c;
    }
    .table tbody tr:hover {
      background-color: #2b2b2b;
    }
    .btn-danger {
      background-color: #d32f2f;
      border: none;
      color: #fff;
    }
    .btn-danger:hover {
      background-color: #b71c1c;
    }
    .btn-warning {
      background-color: #f9a825;
      border: none;
      color: #000;
    }
    .btn-warning:hover {
      background-color: #f57f17;
      color: #fff;
    }
    .btn-primary {
      background-color: #1976d2;
      border: none;
      color: #fff;
    }
    .btn-primary:hover {
      background-color: #0d47a1;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<header class="navbar navbar-dark sticky-top shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Trimis E-Commerce | Admin</a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-danger" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="list_products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home Page</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Products List</h2>
        <a href="add_products.php" class="btn btn-primary">+ Add Product</a>
      </div>

      <div class="table-container">
        <table class="table table-striped table-hover table-bordered text-center align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Quality</th>
              <th>Rating</th>
              <th>Image Link</th>
              <th>Price (€)</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($products_data) > 0): ?>
              <?php foreach ($products_data as $product): ?>
                <tr>
                  <td><?= htmlspecialchars($product['id']) ?></td>
                  <td><?= htmlspecialchars($product['products_name']) ?></td>
                  <td><?= htmlspecialchars($product['products_desc']) ?></td>
                  <td><?= htmlspecialchars($product['products_quality']) ?></td>
                  <td><?= htmlspecialchars($product['products_rating']) ?></td>
                  <td><?= htmlspecialchars($product['products_image']) ?></td>
                  <td><?= htmlspecialchars($product['products_price']) ?></td>
                  <td>
                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_products.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" class="text-center text-muted">No products found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
