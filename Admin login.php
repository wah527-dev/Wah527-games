<?php
session_start();
include '../config.php';

if(isset($_SESSION['admin_logged_in'])) {
    header("Location: dashboard.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($email == "admin@wah527.com" && $password == "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Wah527 Games</title>
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .admin-login-box { background: rgba(255,255,255,0.95); padding: 50px; border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); width: 400px; }
        .admin-title { text-align: center; color: #333; margin-bottom: 30px; }
        .admin-input { width: 100%; padding: 15px; margin: 10px 0; border: 2px solid #ddd; border-radius: 10px; }
        .admin-btn { background: linear-gradient(45deg, #FF416C, #FF4B2B); color: white; padding: 15px; border: none; border-radius: 10px; width: 100%; font-size: 18px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="admin-login-box">
        <h1 class="admin-title">🔒 ADMIN PANEL</h1>
        <h2 style="text-align: center; color: #666;">Wah527 Games</h2>
        <?php if(isset($error)) echo "<div style='color:red; text-align:center; margin:10px;'>$error</div>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Admin Email" class="admin-input" required>
            <input type="password" name="password" placeholder="Admin Password" class="admin-input" required>
            <button type="submit" class="admin-btn">Login to Dashboard</button>
        </form>
        <p style="text-align: center; margin-top: 20px; color: #666;">Default: admin@wah527.com / admin123</p>
    </div>
</body>
</html>
