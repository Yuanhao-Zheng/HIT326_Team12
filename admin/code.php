<?php
include "authentication.php";
?>

<?php

if(isset($_POST['unit_add']))
{
    $unit_code = $_POST['unit_code'];
    $unit_name = $_POST['unit_name'];
    $unit_year = $_POST['unit_year'];
    $unit_semester = $_POST['unit_semester'] == true ? '1':'0'; //can add semester 1,2 and summer
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO units (unit_code,unit_name,unit_year,unit_semester,navbar_status,status) VALUES 
    ('$unit_code','$unit_name','$unit_year','$unit_semester','$navbar_status','$status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Unit Added Successfully";
        header('Location: register-add.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: register-add.php');
        exit(0);
    }

}



if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE user_id='$user_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Deleted Successfully";
        header('Location: view-register.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: view-register.php');
        exit(0);
    }


}

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