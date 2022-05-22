<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>

    </ol>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <?php

                    if (isset($_GET['user_id'])) {

                        $user_id = $_GET['user_id'];
                        $users = "SELECT * FROM users WHERE user_id='$user_id' ";
                        $users_run = mysqli_query($connection, $users);

                        if (mysqli_num_rows($users_run) > 0) {
                            foreach ($users_run as $user) {
                    ?>


                                <form action="code.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user['user_id']; ?>">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="user_firstname" value="<?=$user['user_firstname']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="user_lastname" value="<?=$user['user_lastname']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="user_email" value="<?=$user['user_email']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="user_password" value="<?=$user['user_password']; ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">User Role</label>
                                            <select name="user_role" required class="form-control">
                                                <option value="">--Select Role--</option>
                                                <option value="1" <?= $user['user_role'] == '1' ? 'selected':'' ?> >Admin</option>
                                                <option value="0" <?= $user['user_role'] == '0' ? 'selected':'' ?> >user</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $user['status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                            (*Checked = Visible | Unchecked = Hidden)
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                        </div>
                                    </div>
                                </form>

                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>


                    <?php
                        }
                    }


                    ?>



                </div>

            </div>
        </div>



    </div>
</div>


<!-- footer -->

<?php
include "includes/footer.php";
?>

<!-- scripts -->

<?php
include "includes/scripts.php";
?>