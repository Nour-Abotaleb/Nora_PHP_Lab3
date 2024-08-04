<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            let errors = [];
            
            let firstName = document.getElementById("first_name").value;
            if (firstName === "") {
                errors.push("First Name is required.");
            } else if (!/^[a-zA-Z]+$/.test(firstName)) {
                errors.push("First Name can only contain letters.");
            }

            let lastName = document.getElementById("last_name").value;
            if (lastName === "") {
                errors.push("Last Name is required.");
            } else if (!/^[a-zA-Z]+$/.test(lastName)) {
                errors.push("Last Name can only contain letters.");
            }

            let username = document.getElementById("username").value;
            if (username === "") {
                errors.push("Username is required.");
            } else if (username.length < 8) {
                errors.push("Username must be at least 8 characters long.");
            }

            let password = document.getElementById("password").value;
            if (password === "") {
                errors.push("Password is required.");
            } else if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password)) {
                errors.push("Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.");
            }

            let code = document.getElementById("code").value;
            if (code === "" || code !== "Sh68Sa") {
                errors.push("Invalid code.");
            }
            
            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="done.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <br><br>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">Select Country</option>
            <option value="USA">USA</option>
            <option value="Canada">Egypt</option>
            <option value="UK">New York</option>
        </select>
        <br><br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>
        <br><br>

        <label>Skills:</label>
        <input type="checkbox" id="php" name="skills[]" value="PHP">
        <label for="php">PHP</label>
        <input type="checkbox" id="mysql" name="skills[]" value="MySQL">
        <label for="mysql">MySQL</label>
        <input type="checkbox" id="j2se" name="skills[]" value="J2SE">
        <label for="j2se">J2SE</label>
        <input type="checkbox" id="postgresql" name="skills[]" value="PostgreSQL">
        <label for="postgresql">PostgreSQL</label>
        <br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="OpenSource" readonly>
        <br><br>

        <label for="code">Please insert the code below:</label>
        <p>Sh68Sa</p>
        <input type="text" id="code" name="code" required>
        <br><br>

        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*" required>
        <br><br>

        <input class="submit" type="submit" value="Submit">
        <input class="reset" type="reset" value="Reset">
    </form>
</body>
</html>
