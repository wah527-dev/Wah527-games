<?php
include 'config.php';
if(!is_logged_in()) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Earn from Tasks - Wah527 Games</title>
    <style>
        body { background: #f5f5f5; color: #333; }
        .task-card { background: white; border-radius: 15px; padding: 25px; margin: 20px 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .task-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .task-reward { background: gold; color: #333; padding: 8px 15px; border-radius: 20px; font-weight: bold; }
        .task-timer { background: #4CAF50; color: white; padding: 10px; border-radius: 10px; text-align: center; margin: 10px 0; }
        .btn-start { background: linear-gradient(45deg, #FF9800, #FF5722); color: white; border: none; padding: 15px 30px; border-radius: 10px; font-size: 18px; cursor: pointer; width: 100%; }
        .ad-container { background: #fff3cd; border: 2px dashed #ffc107; padding: 20px; text-align: center; margin: 20px 0; border-radius: 10px; }
    </style>
    <?php echo $monetag_auto_ads; ?>
</head>
<body>
    <div class="container">
        <h1>📋 Available Tasks</h1>
        <p>Complete tasks, watch ads, earn Taj Coins!</p>
        
        <!-- TASK 1 -->
        <div class="task-card">
            <div class="task-header">
                <h3>🎥 Watch YouTube Video</h3>
                <span class="task-reward">+50 TC</span>
            </div>
            <p>Watch the video for 30 seconds and like it</p>
            <div class="ad-container">
                <p>📢 ADVERTISEMENT</p>
                <?php echo $monetag_task_ads; ?>
            </div>
            <div class="task-timer" id="timer1" style="display:none;">
                ⏳ Time Remaining: <span id="time1">30</span> seconds
            </div>
            <button class="btn-start" onclick="startTask(1)">▶️ Start Task (Watch Ad First)</button>
        </div>
        
        <!-- TASK 2 -->
        <div class="task-card">
            <div class="task-header">
                <h3>🌐 Visit Website</h3>
                <span class="task-reward">+30 TC</span>
            </div>
            <p>Stay on website for 30 seconds</p>
            <button class="btn-start" onclick="startTask(2)">▶️ Start Task</button>
        </div>
        
        <!-- TASK 3 -->
        <div class="task-card">
            <div class="task-header">
                <h3>📱 Install Mobile App</h3>
                <span class="task-reward">+100 TC</span>
            </div>
            <p>Download and install our mobile app</p>
            <button class="btn-start" onclick="startTask(3)">▶️ Start Task</button>
        </div>
    </div>
    
    <script>
    function startTask(taskId) {
        // Show ad first
        if(typeof monetag !== 'undefined') {
            monetag.loadAds();
            setTimeout(() => {
                startTimer(taskId);
            }, 2000);
        } else {
            startTimer(taskId);
        }
    }
    
    function startTimer(taskId) {
        let time = 30;
        document.getElementById('timer'+taskId).style.display = 'block';
        const timerElement = document.getElementById('time'+taskId);
        
        const interval = setInterval(() => {
            time--;
            timerElement.textContent = time;
            
            if(time <= 0) {
                clearInterval(interval);
                alert('✅ Task Completed! Coins added to your account.');
                document.getElementById('timer'+taskId).style.display = 'none';
            }
        }, 1000);
    }
    </script>
</body>
</html>
