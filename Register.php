<?php
include 'config.php';
if(is_logged_in()) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $referral = mysqli_real_escape_string($conn, $_POST['referral']);
    
    // Generate referral code
    $ref_code = strtoupper(substr(md5($username . time()), 0, 8));
    
    $sql = "INSERT INTO users (username, password, email, referral_code, referred_by) 
            VALUES ('$username', '$password', '$email', '$ref_code', '$referral')";
    
    if(mysqli_query($conn, $sql)) {
        $success = "Account created successfully! Please login.";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Wah527 Games</title>
    <style>
        .register-box { max-width: 400px; margin: 50px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn-register { background: linear-gradient(45deg, #4CAF50, #8BC34A); color: white; padding: 15px; border: none; border-radius: 10px; width: 100%; font-size: 18px; cursor: pointer; }
        .success { color: green; background: #e6ffe6; padding: 10px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h1 style="text-align: center;">📝 Create Account</h1>
            <?php 
            if(isset($error)) echo "<div class='error'>$error</div>";
            if(isset($success)) echo "<div class='success'>$success</div>";
            ?>
            <form method="POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="Choose Username" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input type="text" name="referral" placeholder="Referral Code (Optional)">
                </div>
                <button type="submit" class="btn-register">Create Account</button>
            </form>
            <p style="text-align: center; margin-top: 20px;">Already have account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
