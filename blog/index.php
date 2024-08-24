<?php

echo "hello world";

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
    <div class="card">
        <div class="card-body">
            <table class="table table striped">
                <div>
                    <a class="btn btn-primary" href="add.php">Create New</a>
                    <a class="btn btn-info" style="float:right" href="logout.php">Logout</a>
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
                    <tr>
                        <td>hello</td>
                        <td>hello</td>
                        <td>hello</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>