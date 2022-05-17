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


            <?php include('message.php'); ?>


            <div class="card">
                <div class="card-header">
                    <h4>Registered User
                    <a href="register-add.php" class="btn btn-primary float-end">Add User</a></h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($connection, $query);


                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['user_id']; ?></td>
                                        <td><?= $row['user_firstname']; ?></td>
                                        <td><?= $row['user_lastname']; ?></td>
                                        <td><?= $row['user_email']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['user_role'] == '1') {
                                                echo 'Admin';
                                            } elseif ($row['user_role'] == '0') {
                                                echo 'User';
                                            }
                                            ?>
                                        </td>
                                        <td><a href="register-edit.php?user_id=<?= $row['user_id']; ?>" class="btn btn-secondary">Edit</td>
                                        <td><button type="button" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>

                            <?php
                            }

                            ?>

                        </tbody>
                    </table>

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