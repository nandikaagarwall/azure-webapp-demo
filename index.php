<?php
// Define log file
$logFile = __DIR__ . "/logs/actions.log";

// Function to write to log
function writeLog($message) {
    global $logFile;
    $entry = date("Y-m-d H:i:s") . " - " . $message . PHP_EOL;
    file_put_contents($logFile, $entry, FILE_APPEND);
}

// Log every page load
writeLog("Page loaded");

// Log authentication info
if (isset($_SERVER['X-MS-CLIENT-PRINCIPAL-NAME'])) {
    $user = $_SERVER['X-MS-CLIENT-PRINCIPAL-NAME'];
    writeLog("User login detected: $user");
} else {
    writeLog("Anonymous access attempt");
}

// Handle button clicks
if (isset($_POST['button'])) {
    $btn = $_POST['button'];
    writeLog("Button $btn clicked");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Sec Lab App</title>
</head>
<body>
    <h1>Welcome to My Sec Lab App 🚀</h1>
    <p>Click a button to generate logs</p>
    <form method="post">
        <button type="submit" name="button" value="1">Button 1</button>
        <button type="submit" name="button" value="2">Button 2</button>
        <button type="submit" name="button" value="3">Button 3</button>
    </form>
</body>
</html>

