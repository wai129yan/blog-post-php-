<?php

require 'config.php';

// var_dump($_POST);check data is passed out by register

if (!empty($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($username === '' || $email === '' || $password == '') {
        echo "<script>alert('fill the form')</script>";
    } else {
         $sql  = "SELECT COUNT(email) AS num FROM users WHERE email = :email";//auery prepare check email
         $stmt = $pdo -> prepare($sql);

         $stmt->bindValue(':email',$email);//bind the data

         $stmt -> execute();//outpiut

         $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        //  var_dump($row);exit(); check the data is passed or not

        // data is already exit or not
        if ($row['num'] > 0) {
            echo "<script>alert('This user email is already exist')</script>";
        }else{
            $passwordHash = password_hash($password,PASSWORD_BCRYPT);
            $sql = "INSERT INTO users(name,email,password) VALUES (:username,:email,:password)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':username',$username);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':password',$passwordHash);

            $result = $stmt->execute();

            if($result) {
                echo "Thanks for your registration".
                '<a href="login.php">Login</a>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Register</h1>

                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Name</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <!-- can check validate by required-->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="login.php">Already have an account? Login here</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>