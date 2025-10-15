<?php
include_once('config.php');

if(isset($_POST['submit']))
{
    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role']; // 'admin' or 'customer'

    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    $tempConfirm = $_POST['confirm_password'];
    $confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);

    if(empty($emri) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($role))
    {
        $error_message = "You have not filled in all the fields.";
    }
    else
    {
        $sql = "INSERT INTO users(emri, username, email, password, confirm_password, is_admin) 
                VALUES (:emri, :username, :email, :password, :confirm_password, :is_admin)";

        $insertSql = $conn->prepare($sql);

        $insertSql->bindParam(':emri', $emri);
        $insertSql->bindParam(':username', $username);
        $insertSql->bindParam(':email', $email);
        $insertSql->bindParam(':password', $password);
        $insertSql->bindParam(':confirm_password', $confirm_password);
        $insertSql->bindParam(':is_admin', $role);

        $insertSql->execute();

        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trimi's E-Commerce - Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-color: #121212;
    color: #f5f5f5;
    font-family: 'Poppins', sans-serif;
}
.container {
    max-width: 500px;
    margin-top: 80px;
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
select.form-select {
    background-color: #2c2c2c;
    color: #f5f5f5;
    border: 1px solid #444;
}
.alert {
    margin-top: 15px;
}
</style>
</head>
<body>

<div class="container">
    <h2>Create Account</h2>

    <?php if(isset($error_message)) { ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php } ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="emri" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="emri" name="emri" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Register As</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">Select Role</option>
                <option value="true">Admin</option>
                <option value="false">Customer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>
    </form>
</div>

</body>
</html>
