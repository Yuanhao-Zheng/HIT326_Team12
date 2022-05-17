<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add User/Admin
                        <a href="view-register.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="user_firstname" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="user_lastname" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="user_email" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Password</label>
                                <input type="text" name="user_password" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">User Role</label>
                                <select name="user_role" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1">Admin</option>
                                    <option value="0">user</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_user" class="btn btn-primary">Add Admin/User</button>
                            </div>
                        </div>
                    </form>




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