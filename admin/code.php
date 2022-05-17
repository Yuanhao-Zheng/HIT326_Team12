<?php
include "authentication.php";
?>

<?php

if(isset($_POST['add_user']))
{
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password, user_role, status) VALUES ('$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_role', '$status')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Successfully";
        header('Location: view-register.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: view-register.php');
        exit(0);
    }
}



if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email='{$user_email}', user_password='{$user_password}', user_role='{$user_role}', status='{$status}' WHERE user_id='$user_id' ";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header('Location: view-register.php');
        exit(0);
    }


}










?>