<?php 
session_start();
include('admin/includes/db.php');

if(isset($_POST['register_btn']))
{
    $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['cpassword']);

    if($user_password == $confirm_password){
        
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


}
else{
    header("Location: register.php");
    exit(0);
}


?>