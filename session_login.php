<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_exists = false;
   
    // Check if the user exists in the file
    try {
        $users = fopen('users.txt', 'r');
        while (!feof($users)) {
            $data = fgets($users);
            if (trim($data) == "") continue; 
            $data = preg_split('/\,/', $data);
            if ($data[6] == $username && $data[7] == $password) {
                $user_exists = true;
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $data[0];
                break;
            }
        }
        fclose($users);
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }

    if ($user_exists) {
        header("Location: welcome.php");
        exit();
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
        echo "<p><a href='login.php'>Go back to login</a></p>";
    }
} else {
    echo "<p>Invalid request.</p>";
    echo "<p><a href='login.php'>Go back to login</a></p>";
}
?>
