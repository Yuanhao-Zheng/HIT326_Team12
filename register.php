<?php 
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged In";
    header("Location: index.php");
    exit(0);
}

include('includes/header.php');
?>

<?php
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">

                        <form action="registercode.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input required type="text" name="user_firstname" placeholder="Enter First Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Last Name</label>
                                <input required type="text" name="user_lastname" placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input required type="email" name="user_email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input required type="password" name="user_password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input required type="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include('includes/footer.php');
?>