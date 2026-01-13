<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wah527 Games - Earn Money</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        header { text-align: center; padding: 40px 0; }
        h1 { font-size: 3rem; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .subtitle { font-size: 1.2rem; opacity: 0.9; }
        .balance-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 30px; margin: 30px 0; border: 1px solid rgba(255,255,255,0.2); }
        .balance-amount { font-size: 3rem; font-weight: bold; color: #FFD700; text-shadow: 0 0 10px rgba(255,215,0,0.5); }
        .btn-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 40px 0; }
        .btn { background: linear-gradient(45deg, #FF416C, #FF4B2B); color: white; padding: 20px; border-radius: 15px; text-align: center; text-decoration: none; font-size: 1.2rem; font-weight: bold; transition: all 0.3s; box-shadow: 0 8px 20px rgba(255,65,108,0.3); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; }
        .btn:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(255,65,108,0.5); }
        .btn-tasks { background: linear-gradient(45deg, #00b09b, #96c93d); }
        .btn-games { background: linear-gradient(45deg, #8A2BE2, #4B0082); }
        .btn-withdraw { background: linear-gradient(45deg, #1E90FF, #00CED1); }
        .btn-login { background: linear-gradient(45deg, #FFA500, #FF4500); }
        .btn-register { background: linear-gradient(45deg, #32CD32, #008000); }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 40px 0; }
        .stat-card { background: rgba(255,255,255,0.1); padding: 20px; border-radius: 15px; text-align: center; }
        footer { text-align: center; padding: 30px; margin-top: 50px; border-top: 1px solid rgba(255,255,255,0.1); }
        @media (max-width: 768px) { h1 { font-size: 2.2rem; } .btn-container { grid-template-columns: 1fr; } }
    </style>
    <!-- Monetag Auto Ads -->
    <script src="https://middle.monetag.io/script.js" data-monetag="a0b1c2d3e4f5"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎮 WAH527 GAMES</h1>
            <p class="subtitle">Play Games, Complete Tasks, Earn Real Money in Pakistan!</p>
        </header>

        <div class="balance-card">
            <h2>💰 YOUR TAJ COINS BALANCE</h2>
            <div class="balance-amount" id="userBalance">0 TC</div>
            <p>Minimum Withdrawal: 5,000 Taj Coins</p>
            <p>Exchange Rate: 10,000 TC = $1 = 280 PKR</p>
        </div>

        <div class="btn-container">
            <a href="tasks.php" class="btn btn-tasks">📋 EARN FROM TASKS</a>
            <a href="games.php" class="btn btn-games">🎮 PLAY & WIN</a>
            <a href="withdraw.php" class="btn btn-withdraw">💰 WITHDRAW MONEY</a>
            <a href="login.php" class="btn btn-login">🔐 LOGIN</a>
            <a href="register.php" class="btn btn-register">📝 REGISTER FREE</a>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h3>📈 Total Users</h3>
                <p style="font-size: 2rem;">1,250+</p>
            </div>
            <div class="stat-card">
                <h3>💵 Total Paid</h3>
                <p style="font-size: 2rem;">$2,500+</p>
            </div>
            <div class="stat-card">
                <h3>⭐ Rating</h3>
                <p style="font-size: 2rem;">4.8/5</p>
            </div>
        </div>

        <div style="text-align: center; margin: 40px 0;">
            <h3>🎯 HOW TO EARN?</h3>
            <p>1. Complete Simple Tasks • 2. Play Fun Games • 3. Refer Friends • 4. Withdraw via Easypaisa/JazzCash</p>
        </div>
    </div>

    <footer>
        <p>© 2024 Wah527 Games. All Rights Reserved. | Contact: support@wah527games.com</p>
        <p style="margin-top: 10px; font-size: 0.9rem;">Easypaisa • JazzCash • Binance Withdrawals Available</p>
    </footer>

    <script>
        // Auto ads every 30 seconds
        setInterval(() => {
            if(typeof monetag !== 'undefined') monetag.loadAds();
        }, 30000);

        // Update balance animation
        let balance = 0;
        const balanceElement = document.getElementById('userBalance');
        setInterval(() => {
            if(balance < 1000) {
                balance += Math.floor(Math.random() * 10);
                balanceElement.textContent = balance + ' TC';
            }
        }, 3000);
    </script>
</body>
</html>
