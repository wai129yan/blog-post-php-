<?php

require 'config.php';

if (!empty($_POST)) {

    // for photo file 
    $targetFile = 'images/' . ($_FILES['image']['name']);
    $imageType = pathinfo($targetFile, PATHINFO_EXTENSION);

    if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
        echo "<script>alert('Image must be png or jpg,jpeg')</script>";
    } else {
        //$move= if you need to check if conditions
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

        // insert data
        $sql = "INSERT INTO posts(title,description,image,created_at) VALUES (:title,:description,:image,:created_at)";

        $pdo_statement = $pdo->prepare($sql);

        $result = $pdo_statement->execute(
            array(
                ':title' => $_POST['title'],
                ':description' => $_POST['description'],
                ':image' => $_FILES['image']['name'],
                ':created_at' => $_POST['created_at'],
            )
        );

        // exit();
        if ($result) {
            echo "<script>alert('New record is Added'); window.location.href='index.php';</script>";
        }
    }
    // print"<pre>";
    // print_r($imageType);
    // exit()
}

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
                <h1 class="card-title text-center mb-4">Add New Record</h1>

                <form action="add.php" method="post" enctype="multipart/form-data">
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
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Add New</button>
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