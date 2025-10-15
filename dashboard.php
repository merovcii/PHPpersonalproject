<?php 
session_start();
include_once('config.php');

if (empty($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// Allow only admins
if ($_SESSION['is_admin'] !== 'true') {
  header("Location: home.php");
  exit;
}

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #121212;
      color: #e0e0e0;
    }
    .navbar {
      background-color: #1e1e1e !important;
    }
    .sidebar {
      background-color: #1e1e1e;
      height: 100vh;
      color: #fff;
    }
    .sidebar a {
      color: #bbb;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #00d4ff;
    }
    table {
      color: #e0e0e0;
    }
    .table thead th {
      background-color: #00d4ff;
      color: #121212;
    }
    .btn-custom {
      background-color: #00d4ff;
      color: #121212;
      border: none;
    }
    .btn-custom:hover {
      background-color: #009dcf;
    }
  </style>
</head>
<body>

<header class="navbar navbar-dark sticky-top shadow">
  <a class="navbar-brand px-3" href="#">
    <?php echo "Welcome Admin, ".$_SESSION['username']; ?>
  </a>
  <div class="navbar-nav ms-auto px-3">
    <a class="nav-link text-light" href="logout.php">Sign out</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active text-info" href="dashboard.php">👥 Users</a></li>
          <li class="nav-item"><a class="nav-link" href="list_products.php">🛍️ Products</a></li>
        </ul>
      </div>
    </nav>

    <!-- Main -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-info">User Management</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users_data as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['id']) ?></td>
              <td><?= htmlspecialchars($user['emri']) ?></td>
              <td><?= htmlspecialchars($user['username']) ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
              <td><?= $user['is_admin'] === 'true' ? 'Admin' : 'Customer' ?></td>
              <td><a href="editUsers.php?id=<?= $user['id']; ?>" class="text-info">Update</a></td>
              <td><a href="deleteUsers.php?id=<?= $user['id']; ?>" class="text-danger" onclick="return confirm('Delete this user?');">Delete</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
