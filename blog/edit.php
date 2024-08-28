<?php

require 'config.php';

if (!empty($_POST)) {

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $created_at = $_POST['created_at'];
    $id = $_GET['id'];
    // $id = $_POST['id'];

    // edit photo
    if ($_FILES) {
        $targetFile = 'images/' . ($_FILES['image']['name']);
        $imageName = $_FILES['image']['name'];
        $imageType = pathinfo($targetFile, PATHINFO_EXTENSION);

        if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
            echo "<script>alert('Image must be png or jpg,jpeg')</script>";
        } else {
            //$move= if you need to check if conditions
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

            $pdo_statement = $pdo->prepare("UPDATE posts set title='$title', description='$desc',image= '$imageName', created_at='$created_at' WHERE id= '$id'");

            $result = $pdo_statement->execute();
        }
    } else {
        $pdo_statement = $pdo->prepare("UPDATE posts set title='$title', description='$desc',created_at='$created_at' WHERE id = '$id'");

        $result = $pdo_statement->execute();
    }
    if ($result) {
        echo "<script>alert('record is updated'); window.location.href='index.php';</script>";
    }
}


$pdo_statement = $pdo->prepare("SELECT * FROM posts WHERE id=" . $_GET['id']);

$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

// print "<pre>";
// print_r($result);
// exit();


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

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<php echo $result[0]['id']?>" <div class="mb-3">
                    <label for="username" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>"
                        required>
            </div>
            <!-- can check validate by required-->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <!-- <input type="text" class="form-control" name="description" required> -->
                <textarea class="form-control" name="description" rows=5
                    cols="80"><?php echo $result[0]['description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <img src="images/<?php echo $result[0]['image'] ?>" width="100" height="100" alt="">
                <br><br>
                <input type="file" class="form-control" name="image">
            </div>

            <div class=" mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" name="created_at"
                    value="<?php echo date('Y-m-d', strtotime($result[0]['created_at'])); ?>">
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