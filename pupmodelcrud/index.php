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
                <div class="card-header  p-3">
                    <h4 class="text-center">PHP POP-UP MODEL CRUD-1
                        <!-- modal code -->
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Insert Data
                        </button>
                        <h4>
                </div>
                <table class="table table-stripped table-bordered table-info">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PHONE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $connection = mysqli_connect("localhost", "root", "", "aprogram");

                        $fetch_query = "SELECT * FROM pop";
                        $fetch_query_run = mysqli_query($connection, $fetch_query);

                        if (mysqli_num_rows($fetch_query_run) > 0) {
                            while ($row = mysqli_fetch_array($fetch_query_run)) {
                                // echo $row['id'];
                        ?>
                        <tr>

                            <td>
                                <?php echo $row['id'] ?></td>
                            <td>
                                <?php echo $row['name'] ?></td>
                            <td>
                                <?php echo $row['email'] ?></td>
                            <td>
                                <?php echo $row['phone'] ?></td>

                            <td>
                                <a href="" class="btn btn-info btn-sm">View Data</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit Data</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm">Delete Data</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            ?>
                        <tr colspan="4">No Recordd Found</tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php

        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo $_SESSION['status'];
        ?>
        <div class=" alert alert-warning alert-dismissible fade show" role="alert">
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