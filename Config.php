<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DATABASE CONFIGURATION - CHANGE THESE!
define('DB_HOST', 'localhost');
define('DB_USER', 'your_mysql_username');
define('DB_PASS', 'your_mysql_password');
define('DB_NAME', 'wah527_games_db');

// Connect to database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SITE SETTINGS
$site_name = "Wah527 Games";
$site_url = "http://yourdomain.com";
$coin_name = "Taj Coins";
$coin_symbol = "TC";
$min_withdraw = 5000;
$coin_rate = 10000;
$pkr_rate = 280;

// MONETAG ADS
$monetag_auto_ads = '<script src="https://middle.monetag.io/script.js" data-monetag="YOUR_CODE_HERE"></script>';

// FUNCTIONS
function format_coins($coins) {
    global $coin_symbol;
    return number_format($coins) . ' ' . $coin_symbol;
}
?>
