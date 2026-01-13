-- Run this in phpMyAdmin

CREATE DATABASE IF NOT EXISTS wah527_games_db;
USE wah527_games_db;

-- Users Table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    taj_coins INT DEFAULT 0,
    referral_code VARCHAR(20) UNIQUE,
    referred_by VARCHAR(20),
    total_earned INT DEFAULT 0,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- Tasks Table
CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    coins_reward INT DEFAULT 50,
    timer_seconds INT DEFAULT 30,
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Withdrawals Table
CREATE TABLE withdrawals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    amount INT NOT NULL,
    method ENUM('easypaisa','jazzcash','binance'),
    account_details TEXT,
    status ENUM('pending','approved','rejected') DEFAULT 'pending',
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    processed_date TIMESTAMP NULL
);

-- Insert Sample Tasks
INSERT INTO tasks (title, description, coins_reward) VALUES
('Watch YouTube Video', 'Watch video for 30 seconds and like', 50),
('Visit Website', 'Stay on website for 30 seconds', 30),
('Install Mobile App', 'Download and install our app', 100),
('Follow Instagram', 'Follow our Instagram page', 40),
('Share on Facebook', 'Share our page on Facebook', 60);

-- Create Admin User
INSERT INTO users (username, password, email, referral_code) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@wah527.com', 'ADMIN001');
-- Password: admin123
