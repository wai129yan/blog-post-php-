<?php

session_start();

include('includes/header.php'); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Insert data into database using bootstrap pop model
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="code.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Phone Number</label>
                        <input type="number" name="phone" class="form-control" placeholder="Enter Number">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save_data">save data</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">php pop-up model crud - 1</h4>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Insert Data
                    </button>


                </div>
            </div>
        </div>
        <?php

        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo $_SESSION['status'];
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong>
            <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['status']);
        }

        ?>
    </div>
</div>






<?php include('includes/footer.php'); ?>