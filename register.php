<?php
require_once "bars.php";
echo getHead();
echo getHeader();
echo getFooter();

//echo phpinfo();
$login = "";
$email = "";
$errors = array();


error_reporting(E_ALL);
ini_set('display_errors', 'On');

require('database/config.php');

$db = mysqli_connect(servername, username, password, dbname);

if ($db->connect_error)
{
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";


if(isset($_POST['submit'])) // when click on Update button
{
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    //$timestamp = date("Y-m-d H:i:s", time()+120*60);

    $query = "INSERT INTO user (name, surname, email, pass) 
  			  VALUES('$name', '$surname', '$email', '$password_1')";
    mysqli_query($db, $query);
}


/*
    $user_check_query = "SELECT * FROM user WHERE login='$login' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    $tmp = 0;

    if ($user) { // if user exists
        if ($user['login'] == $login) {
            $tmp = 1;
            $message1 = "Login existuje";
            echo "<script type='text/javascript'>alert('$message1');</script>";
        }

        if ($user['email'] == $email) {
            $tmp = 1;
            $message2 = "Email existuje";
            echo "<script type='text/javascript'>alert('$message2');</script>";
        }
    }

    // Finally, register user if there are no errors in the form
    $password = md5($password_1);//encrypt the password before saving in the database

    if ($tmp == 0){
        $query = "INSERT INTO my_login (login, name, surname, email, password, time) 
  			  VALUES('$login', '$name', '$surname', '$email', '$password', '$timestamp')";
        mysqli_query($db, $query);

        $_SESSION['login'] = $login;
        $_SESSION['success'] = "Úspešne si prihláseny";
        header('location: index.php');
    }
    else{
        $message6 = "problem existuje";
        echo "<script type='text/javascript'>alert('$message6');</script>";
    }

}
*/
mysqli_close($db); // Close connection



?>
<div id="reg">
    <form method="POST" action="register.php">
        <div class="form-group">
            <label for="name">Meno</label>
            <input type="text" name="name" class="form-control" required>

            <label for="surname">Priezvisko</label>
            <input type="text" name="surname" class="form-control" required>

            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>

            <label for="password">Heslo</label>
            <input type="password" name="password_1" class="form-control" required>

            <label for="password">Zopakuj heslo</label>
            <input type="password" name="password_2" class="form-control" required>
        </div>
        <div class="form-group-sub">
            <input id="btnBackgorund" type="submit" name="submit" value="Odoslať" class="btn btn-primary-warning">
        </div>
        <div>
            <p>Máš už účet? Prihlás sa <a class="odkaz" href="login.php">sem</a></p>
        </div>
    </form>
</div>