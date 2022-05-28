<?php
session_start();
include('admin/includes/db.php');

if (isset($_POST['login_btn'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
} else {
    $_SESSION['message'] = "You are not allowed to access this file";
    header("Location: login.php");
    exit(0);
}

    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $login_query = "SELECT * FROM users WHERE user_email='$user_email' LIMIT 1";
    $login_query_run = mysqli_query($connection, $login_query);

    while ($row = mysqli_fetch_array($login_query_run)) {

        $user_id = $row['user_id'];
        $user_name = $row['user_firstname'] . ' ' . $row['user_lastname'];
        $user_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $user_role = $row['user_role'];
    }

        

        if(password_verify($user_password, $db_user_password)){

            $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_role"; //1 = admin, 0=user
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];

        if ($_SESSION['auth_role'] == '1')  {  //1=admin
            $_SESSION['message'] = "Welcome to dashboard";
            header("Location: admin/index.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == '0') {   //0=user
            $_SESSION['message'] = "You are Logged In";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header("Location: login.php");
        exit(0);
    }
