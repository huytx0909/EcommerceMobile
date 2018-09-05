<?php 



if (isset($_POST['register_button'])) {

    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    $sql1 = "SELECT * FROM users WHERE full_name = '$username'";
    $result1 = mysqli_query($db, $sql1); 

    if (mysqli_num_rows($result1) >= 1) {
        $_SESSION['message'] = "Username existed in database";
    } else {
        if (strlen($username) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($password2) == 0 ) {
            $_SESSION['message'] = "Not enough info!"; 
        }  else if ($password == $password2) {
        //create user to enter database
            $createUser = "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'";
            mysqli_query($db, $createUser); 
            // insert user
            $password = md5($password); //hash the password.
            $sql = "INSERT INTO users(full_name, email, password) VALUES('$username', '$email', '$password')";
            $result = mysqli_query($db, $sql);
            $sql2 = "GRANT SELECT, ALTER, CREATE TEMPORARY TABLES, EXECUTE ON *.* TO '$username'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
            mysqli_query($db, $sql2);
            
            $_SESSION['message'] = "You are logged in";
            $_SESSION['username'] = $username;
            header("location: index.php"); //redirect to home after registering successfully
        } else {
            $_SESSION['message'] = "2 passwords do not match, make sure those 2 are matched!";
        }
    }
    
}
?>


    <div class="header"> 
        <h1> Register, Log in, Log out </h1>
    </div>

    <?php 
    if (isset($_SESSION['message'])) {
        echo "<div id = 'error_msg'>".$_SESSION['message']."</div";
        unset($_SESSION['message']);
    } ?>

    <form method="POST" action="index.php?page=register1">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>

            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" class="textInput"></td>
            </tr>

            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>

            <tr>
                <td>Re-type Password: </td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="register_button" value="Register" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
