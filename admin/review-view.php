<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Reviews</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Reviews
                        <a href="review-add.php" class="btn btn-primary float-end">Add Review</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Review Id</th>
                                    <th>Student Id</th>
                                    <th>Group Number</th>
                                    <th>Criterion 1</th>
                                    <th>Criterion 2</th>
                                    <th>Criterion 3</th>
                                    <th>Criterion 4</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $reviews = "SELECT * FROM reviews";
                                $reviews_run = mysqli_query($connection, $reviews);

                                if (mysqli_num_rows($reviews_run) > 0) {
                                    foreach ($reviews_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['review_id'] ?></td>
                                            <td><?= $item['student_id'] ?></td>
                                            <td><?php 
                                        $query = mysqli_query($connection, "SELECT group_number From groups WHERE group_id='{$item['group_id']}' ");
                                        while ($row = mysqli_fetch_array($query)){
                                        $group_number = $row['group_number'] ;
                                        echo $group_number;
                                        }
                                        ?></td> 
                                            <td><?= $item['criterion_1'] ?></td>
                                            <td><?= $item['criterion_2'] ?></td>
                                            <td><?= $item['criterion_3'] ?></td>
                                            <td><?= $item['criterion_4'] ?></td>
                                            
                                            <td><a href="review-edit.php?review_id=<?= $item['review_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                <button onClick="javascript: return confirm('Are you sure you want to delete');" href="submit" name="review_delete" value="<?= $item['review_id'] ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                                
                                            </td>
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
</div>


<!-- footer -->

<?php
include "includes/footer.php";
?>

<!-- scripts -->

<?php
include "includes/scripts.php";
?>