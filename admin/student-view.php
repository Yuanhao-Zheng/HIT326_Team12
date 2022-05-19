<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Students</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Students
                        <a href="student-add.php" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Student Number</th>
                                    <th>Student FirstName</th>
                                    <th>Student LastName</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = "SELECT * FROM students";
                                $students_run = mysqli_query($connection, $students);

                                if (mysqli_num_rows($students_run) > 0) {
                                    foreach ($students_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['student_id'] ?></td>
                                            <td><?= $item['student_number'] ?></td>
                                            <td><?= $item['student_firstname'] ?></td>
                                            <td><?= $item['student_lastname'] ?></td>
                                            <td>
                                                <?= $item['status'] == '1' ? 'Visible':'Hidden' ?>
                                            </td>
                                            <td><a href="student-edit.php?student_id=<?= $item['student_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                <button href="submit" name="student_delete" value="<?= $item['student_id'] ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
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
</div>


<!-- footer -->

<?php
include "includes/footer.php";
?>

<!-- scripts -->

<?php
include "includes/scripts.php";
?>