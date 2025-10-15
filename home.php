<?php 
include_once('config.php');

$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trimi's E-Commerce Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #f5f5f5;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: #1e1e1e;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .navbar-brand {
      font-weight: 600;
      font-size: 1.3rem;
      color: #00d4ff !important;
    }

    .product-card {
      background-color: #1c1c1c;
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.6);
    }

    .product-card img {
      height: 200px;
      object-fit: cover;
      border-bottom: 1px solid #333;
    }

    .product-info {
      padding: 15px;
    }

    .product-info h5 {
      color: #00d4ff;
      font-size: 1.1rem;
      margin-bottom: 5px;
    }

    .product-info p {
      color: #ccc;
      font-size: 0.9rem;
    }

    .footer {
      margin-top: 60px;
      padding: 20px;
      text-align: center;
      background-color: #1e1e1e;
      color: #888;
    }

    .btn-outline-info {
      color: #00d4ff;
      border-color: #00d4ff;
    }
    .btn-outline-info:hover {
      background-color: #00d4ff;
      color: #000;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="#">🛍 Trimi's E-Commerce</a>
    <div class="d-flex">
      <a href="dashboard.php" class="btn btn-outline-info me-2">Dashboard</a>
      <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="text-center py-5">
  <h1 class="fw-bold">Welcome to Trimi’s E-Commerce Website</h1>
  <p class="text-secondary">Explore our high-quality products below!</p>
</header>

<!-- Products Grid -->
<div class="container">
  <div class="row g-4">
    <?php if (count($products) > 0): ?>
     <div class="product-container">
<?php foreach ($products as $product): ?>
    <div class="product-card">
        <!-- Product Image -->
        <?php 
            $imagePath = !empty($product['products_image']) ? $product['products_image'] : 'images/default.jpg';
        ?>
        <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Product Image" class="product-image">

        <!-- Product Info -->
        <h5 class="product-name"><?php echo htmlspecialchars($product['products_name']); ?></h5>
        <p class="product-desc"><?php echo htmlspecialchars($product['products_desc']); ?></p>
        <p><strong>Quality:</strong> <?php echo htmlspecialchars($product['products_quality']); ?></p>
        <p><strong>Rating:</strong> ⭐ <?php echo htmlspecialchars($product['products_rating']); ?>/10</p>
       <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['products_price']); ?></p>


        <!-- Optional Button -->
        <button class="buy-button">Buy Now</button>
    </div>
<?php endforeach; ?>
</div>

    <?php else: ?>
      <div class="text-center">
        <p class="text-muted">No products found in the database.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>© 2025 Trimi's E-Commerce | Built with ❤️ using PHP & Bootstrap</p>
</div>

</body>
</html>
