<?php
include "authentication.php";
?>

<?php

if(isset($_POST['review_delete']))
{
    $review_id = $_POST['review_delete'];

    $query = "DELETE FROM reviews WHERE review_id='$review_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Review Deleted Successfully";
        header('Location: review-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: review-view.php');
        exit(0);
    }


}


if(isset($_POST['review_update']))
{
    $review_id = $_POST['review_id'];
    $criterion_1 = $_POST['criterion_1'];
    $criterion_2 = $_POST['criterion_2'];
    $criterion_3 = $_POST['criterion_3'];
    $criterion_4 = $_POST['criterion_4'];
    

    $query = "UPDATE reviews SET criterion_1='$criterion_1',criterion_2='$criterion_2',criterion_3='$criterion_3',criterion_4='$criterion_4', submit_id='$submit_id' 
    WHERE review_id='$review_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Review Updated Successfully";
        header('Location: review-edit.php?review_id='.$review_id);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: review-edit.php?review_id='.$review_id);
        exit(0);
    }
}

if(isset($_POST['review_add']))
{
    $join_id = $_POST['join_id'];
    // $group_id = $_POST['group_id'];
    $criterion_1 = $_POST['criterion_1'];
    $criterion_2 = $_POST['criterion_2'];
    $criterion_3 = $_POST['criterion_3'];
    $criterion_4 = $_POST['criterion_4'];
    $submit_id = $_POST['submit_id'];

    $query = "INSERT INTO reviews (join_id,criterion_1,criterion_2, criterion_3, criterion_4, submit_id) VALUES 
    ('$join_id','$criterion_1','$criterion_2','$criterion_3','$criterion_4', '$submit_id')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Review Added Successfully";
        header('Location: review-add.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: review-add.php');
        exit(0);
    }
}

if(isset($_POST['student_delete']))
{
    $student_id = $_POST['student_delete'];

    $query = "DELETE FROM students WHERE student_id='$student_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header('Location: student-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: student-view.php');
        exit(0);
    }


}

if(isset($_POST['student_update']))
{
    $student_id = $_POST['student_id'];
    $student_firstname = $_POST['student_firstname'];
    $student_lastname = $_POST['student_lastname'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE students SET student_id='$student_id', student_firstname='$student_firstname', student_lastname='$student_lastname', status='$status'
    WHERE student_id='$student_id' ";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header('Location: student-edit.php?student_id='.$student_id);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: student-edit.php?student_id='.$student_id);
        exit(0);
    }

}

if(isset($_POST['student_add']))
{
    $student_id = $_POST['student_id'];
    $student_firstname = $_POST['student_firstname'];
    $student_lastname = $_POST['student_lastname'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO students (student_id,student_firstname,student_lastname,status) VALUES 
    ('$student_id','$student_firstname','$student_lastname','$status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Added Successfully";
        header('Location: student-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: student-view.php');
        exit(0);
    }

}


if(isset($_POST['group_delete']))
{
    $group_id = $_POST['group_delete'];

    $query = "DELETE FROM groups WHERE groups.group_id='$group_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Group Deleted Successfully";
        header('Location: group-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: group-view.php');
        exit(0);
    }


}

if(isset($_POST['group_update']))
{
    $group_id = $_POST['group_id'];
    // $unit_id = $_POST['unit_id'];
    $group_number = $_POST['group_number'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE groups SET group_number='$group_number',navbar_status='$navbar_status',status='$status' 
    WHERE group_id='$group_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Group Updated Successfully";
        header('Location: group-edit.php?group_id='.$group_id);
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: group-edit.php?group_id='.$group_id);
        exit(0);
    }
}


if(isset($_POST['group_add']))
{
    $assignment_id = $_POST['assignment_id'];
    $group_number = $_POST['group_number'];
    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO groups (assignment_id,group_number,navbar_status,status) VALUES 
    ('$assignment_id','$group_number','$navbar_status','$status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Group Added Successfully";
        header('Location: group-add.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: group-add.php');
        exit(0);
    }
}


if(isset($_POST['assignment_delete']))
{
    $assignment_id = $_POST['assignment_delete'];

    $query = "DELETE FROM assignments WHERE assignments.assignment_id='$assignment_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Assignment Deleted Successfully";
        header('Location: assignment-view.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: Assignment-view.php');
        exit(0);
    }


}


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

if(isset($_POST['update_profile']))
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
        header('Location: profile.php?user_id='.$user_id);
        exit(0);
    }


}










?>