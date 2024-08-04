<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2 style="text-align: center; color: green;">Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h2>
    <!-- <p>You are now logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>.</p> -->
</body>
</html>
