<?php
// Set timezone to IST
date_default_timezone_set('Asia/Kolkata');

// Log file path
$logFile = __DIR__ . '/logs/activity.log';

// Ensure logs folder exists
if (!file_exists(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0777, true);
}

// Log page load
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Page loaded\n", FILE_APPEND);

// Handle button clicks
if (isset($_POST['action']) && $_POST['action'] === 'button_click') {
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Button clicked!\n", FILE_APPEND);
}

// Handle login attempts
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Login attempt with username: $username\n", FILE_APPEND);
}

// Handle log download
if (isset($_POST['action']) && $_POST['action'] === 'download_logs') {
    if (file_exists($logFile)) {
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="activity.log"');
        header('Content-Length: ' . filesize($logFile));
        readfile($logFile);
        exit;
    } else {
        echo "No logs found!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Secure Lab App</title>
</head>
<body>
    <h1>Welcome to My Secure Lab App 🚀</h1>
    <p>This page logs activity like page loads, button clicks, and login attempts.</p>

    <!-- Button -->
    <form method="post">
        <input type="hidden" name="action" value="button_click">
        <button type="submit">Click Me!</button>
    </form>

    <br>

    <!-- Login Form -->
    <form method="post">
        <input type="text" name="username" placeholder="Enter username" required><br><br>
        <input type="password" name="password" placeholder="Enter password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <br>

    <!-- Download Logs -->
    <form method="post">
        <input type="hidden" name="action" value="download_logs">
        <button type="submit">Download Logs</button>
    </form>
</body>
</html>
