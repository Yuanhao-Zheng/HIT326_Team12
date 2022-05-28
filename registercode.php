<?php 
session_start();
include('admin/includes/db.php');

if(isset($_POST['register_btn']))
{
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['cpassword'];

    if(!empty($user_firstname) && !empty($user_lastname) && !empty($user_email) 
    && !empty($user_password) && !empty($confirm_password)){


    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $confirm_password = mysqli_real_escape_string($connection, $confirm_password);


    if($user_password == $confirm_password){

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        
        // check email
        $checkemail = "SELECT user_email FROM users WHERE user_email='$user_email' ";
        $checkemail_run = mysqli_query($connection, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            // already email exists
            $_SESSION['message'] = "Already Email Exists";
            header("Location: register.php");
            exit(0);
        }
        else{
            $user_query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password) VALUES ('$user_firstname', '$user_lastname', '$user_email', '$user_password')";
            $user_query_run = mysqli_query($connection, $user_query);

            if($user_query_run)
            {
                $_SESSION['message'] = "Registered Sucessfully";
                header("Location: login.php");
                exit(0); 
            }
            else{
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: register.php");
                exit(0);
            }
        }

    }else{
        $_SESSION['message'] = "Password and Confirm Password does not Match";
        header("Location: register.php");
        exit(0);

    }
    }else {
        $_SESSION['message'] = "Fields cannot be empty";
        header("Location: register.php");
        exit(0);
    }

}
else{
    header("Location: register.php");
    exit(0);
}
