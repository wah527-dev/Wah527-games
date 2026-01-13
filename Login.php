<?php
include 'config.php';
if(is_logged_in()) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['balance'] = $user['taj_coins'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Wah527 Games</title>
    <style>
        .login-box { max-width: 400px; margin: 50px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .input-group { margin: 20px 0; }
        input { width: 100%; padding: 15px; border: 2px solid #ddd; border-radius: 10px; font-size: 16px; }
        .btn-login { background: linear-gradient(45deg, #2196F3, #21CBF3); color: white; padding: 15px; border: none; border-radius: 10px; width: 100%; font-size: 18px; cursor: pointer; }
        .error { color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1 style="text-align: center;">🔐 Login</h1>
            <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
            <form method="POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
            <p style="text-align: center; margin-top: 20px;">Don't have account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
