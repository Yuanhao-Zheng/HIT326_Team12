<?php 
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4" style="text-align: center">Peer Review Assessment Form</h4>
    <?php
    if (isset($_SESSION['error'])) 
    {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>WARNING:</strong> <?= $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['error']);
    }
    ?>
    <div class="row mt-4">
        <form action="formhandle.php" method="POST">
            <div class="col-md-12">
                <?php
                $group_id = $_SESSION['group_id'];
                $students_query = "SELECT * FROM joins WHERE group_id={$group_id}";
                $students = mysqli_query($connection, $students_query);

                if (mysqli_num_rows($students) > 0) 
                {
                    foreach ($students as $student) 
                    {
                ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Student: <?= $student['student_id'] ?></h4>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="">Criterion 1</label>
                                                <input type="text" name="<?= $student['student_id'] ?>_criterion_1" required class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Criterion 2</label>
                                                <input type="text" name="<?= $student['student_id'] ?>_criterion_2" required class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Criterion 3</label>
                                                <input type="text" name="<?= $student['student_id'] ?>_criterion_3" required class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Criterion 4</label>
                                                <input type="text" name="<?= $student['student_id'] ?>_criterion_4" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="col-md-12 mb-3" style="text-align: center">
                    <input type="hidden" id="group_id" name="group_id" value="<?= $_SESSION['group_id'] ?>">
                    <input type="hidden" id="submit_id" name="submit_id" value="<?= $_SESSION['submit_id'] ?>">
                    <button type="submit" name="final" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
include('includes/footer.php');
?> 