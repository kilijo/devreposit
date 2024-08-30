<?php
session_start();
include('login_connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    // Check if username or password is empty and validate input
    if(empty($uname)) {
        $_SESSION['unameSms'] = "Username is required";
        header("location:login.php");
        exit();
    } elseif(!filter_var($uname, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['unameSms'] = "Invalid username format";
        header("location:login.php");
        exit();
    } elseif(empty($upass)) {
        $_SESSION['upassSms'] = "Password is required";
        header("location:login.php");
        exit();
    } elseif(strlen($upass) < 4) {
        $_SESSION['upassSms'] = "Password must not be less than four characters";
        header("location:login.php");
        exit();
    } elseif(!preg_match("#[0-9]+#", $upass)) {
        $_SESSION['upassSms'] = "Password must contain at least one numeric value";
        header("location:login.php");
        exit();
    } elseif(!preg_match("#[a-z]+#", $upass)) {
        $_SESSION['upassSms'] = "Password must contain at least one lowercase letter";
        header("location:login.php");
        exit();
    } elseif(!preg_match("#[A-Z]+#", $upass)) {
        $_SESSION['upassSms'] = "Password must contain at least one uppercase letter";
        header("location:login.php");
        exit();
    } else {
        // Execute the SQL query to retrieve user information
        $sql4 = "SELECT * FROM users WHERE email = '$uname'";
        $res = mysqli_query($connect, $sql4);

        if($rows = mysqli_fetch_array($res)) {
            // Verify the password with the stored hash
            if(password_verify($upass, $rows['password'])){
                // (password_verify($upass, $rows['password']) && $rows['usertype']=="admin")
                $_SESSION['username'] = $uname;
                $_SESSION['usertype'] = $rows['usertype'];


                // // Redirect based on user type
                switch ($rows['usertype']) {
                     case 'admin':
                         header("location:view.php");
                         break;
                     case 'accountant':
                         header("location:accountant_view.php");
                         break;
                     case 'secretary':
                         header("location:secretary_view.php");
                         break;
                     case 'auditor':
                         header("location:auditor_view.php");
                         break;
                     default:
                         header("location:login.php");
                         break;
                 }
            } else {
                echo "<script>alert('Username or password doesn\'t exist'); window.location='login.php';</script>";
            }
        } else {
            echo "<script>alert('Username or password doesn\'t exist'); window.location='login.php';</script>";
        }
    }
}
?>
