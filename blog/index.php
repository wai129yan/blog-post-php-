<?php

require 'config.php';

session_start();

if (empty($_SESSION['user_id']) || empty($_SESSION['logged_in'])) {
    echo "
    <script>
    alert('Please Login To Continue');
    window.location.href = 'login.php';
    </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $pdo_statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();

    // print "<pre>";
    // print_r($result);
    // exit();
    ?>





    <div class="card">
        <div class="card-body">
            <table class="table table striped">
                <h1 class="text-center">Post Management</h1>
                <div>
                    <a class="btn btn-primary" href="add.php">Create New</a>
                    <a class="btn btn-danger" style="float:right" href="logout.php">Logout</a>
                </div><br>
                <thead>
                    <tr>
                        <th width="20%">Title</th>
                        <th width="40%">Description</th>
                        <th width="20%">Created At</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result) {
                        foreach ($result as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
                        <td>

                            <a class="btn btn-info" href="edit.php?id=<?php echo $value['id'] ?>">Edit</a>


                            <a class="btn btn-danger" href="delete.php?id=<?php echo $value['id'] ?>">Delete</a>

                        </td>
                    </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>