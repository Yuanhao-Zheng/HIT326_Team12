<?php
include "authentication.php";
?>

<?php

if(isset($_POST['assignment_update']))
{
    $assignment_id = $_POST['assignment_id'];
    // $unit_id = $_POST['unit_id'];
    $assignment_title = $_POST['assignment_title'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE assignments SET assignment_title='$assignment_title',navbar_status='$navbar_status',status='$status' 
    WHERE assignment_id='$assignment_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Assignment Updated Successfully";
        header('Location: assignment-edit.php?assignment_id='.$assignment_id);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: assignment-edit.php?assignment_id='.$assignment_id);
        exit(0);
    }
}


if(isset($_POST['assignment_add']))
{
    $unit_id = $_POST['unit_id'];
    $assignment_title = $_POST['assignment_title'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO assignments (unit_id,assignment_title,navbar_status,status) VALUES 
    ('$unit_id','$assignment_title','$navbar_status','$status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "assignment Added Successfully";
        header('Location: assignment-add.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: assignment-add.php');
        exit(0);
    }
}



if(isset($_POST['unit_delete']))
{
    $unit_id = $_POST['unit_delete'];

    $query = "DELETE FROM units WHERE unit_id='$unit_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Unit Deleted Successfully";
        header('Location: unit-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: unit-view.php');
        exit(0);
    }


}

if(isset($_POST['unit_update']))
{
    $unit_id = $_POST['unit_id'];
    $unit_code = $_POST['unit_code'];
    $unit_name = $_POST['unit_name'];
    $unit_year = $_POST['unit_year'];
    $unit_semester = $_POST['unit_semester'] == true ? '1':'0'; //can add semester 1,2 and summer
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE units SET unit_code='$unit_code', unit_name='$unit_name', unit_year='$unit_year', unit_semester='$unit_semester', navbar_status='$navbar_status', status='$status'
    WHERE unit_id='$unit_id' ";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Unit Updated Successfully";
        header('Location: unit-edit.php?unit_id='.$unit_id);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: unit-edit.php?unit_id='.$unit_id);
        exit(0);
    }

}


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
        header('Location: unit-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: unit-view.php');
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