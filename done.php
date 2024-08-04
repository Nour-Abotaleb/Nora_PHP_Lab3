<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $code = $_POST['code'];

    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check === false) {
        $errors[] = "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["profile_image"]["size"] > 500000) { 
        $errors[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }

    if (empty($first_name)) $errors[] = "First Name is required.";
    if (!preg_match("/^[a-zA-Z]+$/", $first_name)) $errors[] = "First Name can only contain letters.";

    if (empty($last_name)) $errors[] = "Last Name is required.";
    if (!preg_match("/^[a-zA-Z]+$/", $last_name)) $errors[] = "Last Name can only contain letters.";

    if (empty($username)) $errors[] = "Username is required.";
    if (strlen($username) < 8) $errors[] = "Username must be at least 8 characters long.";

    if (empty($password)) $errors[] = "Password is required.";
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) $errors[] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";

    if (empty($address)) $errors[] = "Address is required.";
    if (empty($country)) $errors[] = "Country is required.";
    if (empty($gender)) $errors[] = "Gender is required.";
    if (empty($code) || $code != "Sh68Sa") $errors[] = "Invalid code.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='registration.php'>Go back</a></p>";
    } else {
        $user_data = "$first_name,$last_name,$address,$country,$gender," . implode(":", $skills) . ",$username,$password,OpenSource,$image_path\n";
        file_put_contents('users.txt', $user_data, FILE_APPEND);

        echo "<h2>Submitted Information</h2>";
        echo "<p><strong>First Name:</strong> $first_name</p>";
        echo "<p><strong>Last Name:</strong> $last_name</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Skills:</strong> " . implode(", ", $skills) . "</p>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Department:</strong> OpenSource</p>";
        echo "<p><strong>Profile Image:</strong> <img src='$image_path' alt='Profile Image' width='100'></p>";
    }
} else {
    echo "<p>Invalid request.</p>";
    echo "<p><a href='registration.php'>Go back</a></p>";
}
?>
