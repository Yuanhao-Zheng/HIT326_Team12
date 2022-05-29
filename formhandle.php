<?php
include('admin/includes/db.php');
?>

<?php
session_start();

if(isset($_POST['next']))
{
    $unit_id = $_POST['unit_id'];
    $assignment_title = $_POST['assignment_title'];
    $group_number = $_POST['group_number'];
    $student_number = $_POST['student_number'];

    // Check if the unit contains the assignment
    $assignment_query = "SELECT * FROM assignments WHERE unit_id = {$unit_id} AND assignment_title = '{$assignment_title}'";
    $assignments = mysqli_query($connection, $assignment_query);
    if(mysqli_num_rows($assignments) > 0) 
    {
        // Check if the assignment contains the group
        $group_query = "SELECT groups.* FROM assignments, groups WHERE groups.group_number={$group_number} AND assignments.assignment_id = groups.assignment_id AND assignments.assignment_title='{$assignment_title}'";
        $groups = mysqli_query($connection, $group_query);
        if(mysqli_num_rows($groups) > 0)
        {   
            $group_id = "";
            foreach($groups as $group)
            {
                $group_id = $group['group_id'];
            }

            // Check if the student exist in the group
            $exist_query = "SELECT * FROM joins WHERE group_id={$group_id} AND student_id='{$student_number}'";
            $exists = mysqli_query($connection, $exist_query);
            if(mysqli_num_rows($exists) > 0)
            {
                // Check if this student has submitted any review for this group
                $submit_query = "SELECT reviews.* FROM joins, reviews WHERE joins.join_id=reviews.join_id AND joins.group_id={$group_id} AND reviews.submit_id='{$student_number}'";
                $submits = mysqli_query($connection, $submit_query);
                if(mysqli_num_rows($submits) > 0)
                {
                    $_SESSION['error'] = "This student number has been used to submit review for the group";
                    header('Location: check.php');
                    exit(0);
                }
                else
                {
                    $_SESSION['submit_id'] = $student_number;
                    $_SESSION['group_id'] = $group_id;
                    header('Location: form.php');
                    exit(0);
                }
            }
            else
            {
                $_SESSION['error'] = "The student number does not exist in the group.";
                header('Location: check.php');
                exit(0);
            }
        }
        else
        {
            $_SESSION['error'] = "The assignment doesn't contain the entered group number.";
            header('Location: check.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['error'] = "The selected unit doesn't contain the entered assignment title.";
        header('Location: check.php');
        exit(0);
    }
}

if(isset($_POST['final']))
{
    $group_id = $_POST['group_id'];
    $submit_id = $_POST['submit_id'];

    $join_query = "SELECT * FROM joins WHERE group_id={$group_id}";
    $joins = mysqli_query($connection, $join_query);
    if(mysqli_num_rows($joins) > 0)
    {   
        $pass = True;
        foreach($joins as $join)
        {
            $student_id = $join['student_id'];
            $join_id = $join['join_id'];
            $criterion_1 = (int)$_POST[$student_id.'_criterion_1'];
            $criterion_2 = (int)$_POST[$student_id.'_criterion_2'];
            $criterion_3 = (int)$_POST[$student_id.'_criterion_3'];
            $criterion_4 = (int)$_POST[$student_id.'_criterion_4'];

            $add_query = "INSERT INTO reviews (join_id,criterion_1,criterion_2, criterion_3, criterion_4, submit_id) VALUES 
            ('$join_id','$criterion_1','$criterion_2','$criterion_3','$criterion_4', '$submit_id')";

            $add_run = mysqli_query($connection, $add_query);

            if($add_run)
            {
                $pass = True;
            }else
            {
                $pass = False;
                break;
            }
        }
        if($pass == True)
        {
            header('Location: complete.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "There was something wrong with your criterion input!";
            header('Location: form.php');
            exit(0);
        }
        
    }
    
}


?>