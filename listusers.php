<table width="100%" border="1px solid">
    <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Address</td>
        <td>Country</td>
        <td>Gender</td>
        <td>Skills</td>
        <td>Username</td>
        <td>Password</td>
        <td>Department</td>
        <td>Profile Image</td>
        <td>Options</td>
    </tr>
    <?php
    try {
        $users = fopen('users.txt', 'r');
        while (!feof($users)) {
            $data = fgets($users);
            if (trim($data) == "") continue;
            $data = preg_split('/\,/', $data);
            ?>
            <tr>
                <?php for ($i = 0; $i < count($data); $i++) { ?>
                    <td>
                        <?php
                        if ($i == count($data) - 1) {
                        
                            echo "<img src='" . trim($data[$i]) . "' alt='Profile Image' width='50'>";
                        } else {
                            echo $data[$i];
                        }
                        ?>
                    </td>
                <?php } ?>
                
                <td>
                    <button style="background-color: #66df66;; border: none; border-radius: 5px; padding: 8px; cursor: pointer;" type="submit">Update</button>
                    <button style="background-color:  #e27d7d; border: none; border-radius: 5px; padding: 8px; cursor: pointer;" type="submit">Delete</button>
                    <button style="background-color: #5483e9; border: none; border-radius: 5px; ; padding: 8px; cursor: pointer;" type="submit">Show Details</button>
                </td>
            </tr>
            <?php
        }
        fclose($users);
    } catch (Exception $ex) {
        echo 'error';
    }
    ?>
</table>
