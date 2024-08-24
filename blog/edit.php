<?php

require 'config.php';

// if (!empty($_POST)) {
//     $sql = "INSERT INTO posts(title,description,created_at) VALUES (:title,:description,:created_at)";

//     $pdo_statement = $pdo->prepare($sql);

//     $result = $pdo_statement->execute(
//         array(
//             ':title' => $_POST['title'],
//             ':description' => $_POST['description'],
//             ':created_at' => $_POST['created_at']
//         )
//     );

//     if ($result) {
//         echo "<script>alert('New record is Added'); window.location.href='index.php';</script>";
//     }
// }






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Edit Record</h1>

                <form action="edit.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <!-- can check validate by required-->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <!-- <input type="text" class="form-control" name="description" required> -->
                        <textarea class="form-control" name="description" rows=5 cols="80"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a class="btn btn-info" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>