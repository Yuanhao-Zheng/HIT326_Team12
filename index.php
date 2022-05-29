<?php

include('includes/header.php');
?>

<?php
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php include('message.php'); ?>

                <div class="card">
                    <div calss="card-body">
                        <h3 style="text-align: center">Hello</h3>
                        <h4 style="text-align: center">The form for students to submit their group peer review: <a href="/check.php">http://localhost:8888/check.php</a></h4>
                        <p style="text-align: center">Note: (Lecturer can copy above URL and sent it to student for their submission)</p>
                    </div>
                </div>
                <br/>
                <br/>
                <br/>

                <div class="card">
                    <div calss="card-body">
                        <h5 style="text-align: center">For the lecturer, please register or login to view all units.</a></h5>
                        <h5 style="text-align: center">For the admin, please register or login to manage the databases.</h5>
                    </div>
                </div>
                <br/>
                <br/>

                <div class="card">
                    <div calss="card-body">
                        <h5 style="text-align: center">PS: For marking convenience, you can use the accounts listed below.</a></h5>
                        <p style="text-align: center">admin username: admin@admin.com <br/> admin password: admin </p>
                        <p style="text-align: center">lecturer username: lecturer@lecturer.com <br/> lecturer password: lecturer</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>





<?php
include('includes/footer.php');
?>