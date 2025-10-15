<?php
session_start();
include_once('config.php');

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $error_message = "Please fill in all fields.";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])) {
            // Store session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // Redirect based on role
            if($user['is_admin'] === 'true') {
                header("Location: dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit;
        } else {
            $error_message = "Incorrect username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trimi's E-Commerce - Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-color: #121212;
    color: #f5f5f5;
    font-family: 'Poppins', sans-serif;
}
.container {
    max-width: 400px;
    margin-top: 100px;
    padding: 30px;
    background-color: #1e1e1e;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.5);
}
h2 {
    color: #00d4ff;
    margin-bottom: 25px;
    text-align: center;
}
.form-control {
    background-color: #2c2c2c;
    color: #f5f5f5;
    border: 1px solid #444;
}
.form-control:focus {
    background-color: #2c2c2c;
    color: #fff;
    border-color: #00d4ff;
    box-shadow: none;
}
.btn-primary {
    background-color: #00d4ff;
    border: none;
}
.btn-primary:hover {
    background-color: #008bbf;
}
.alert {
    margin-top: 15px;
}
</style>
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if(isset($error_message)) { ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php } ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
    </form>

    <p class="mt-3 text-center">Don't have an account? <a href="register.php" style="color:#00d4ff;">Register</a></p>
</div>

</body>
</html>
