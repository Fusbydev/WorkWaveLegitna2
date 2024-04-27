<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>WorkWave-LogIn</title>
</head>
<body>
        <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-md-6 login">
                        <form action="login-page.php" method="post">
                            <input type="email" placeholder="email" name="email"><br>
                            <input type="password" placeholder="password" name="pass"><br>
                            <p>don't have an account? <a href="index.php">click here</a></p>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>

                        <?php if($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['login'])) {
                                $password = $_POST['pass'];
                                $email = $_POST['email'];
                                $email = mysqli_real_escape_string($conn, $email);
                                $result = mysqli_query($conn, "SELECT * FROM accounts WHERE email = '$email'");
                                if($row = mysqli_fetch_assoc($result)) {
                                    if($password == $row['password']) {
                                        if($row['setup'] == 0) {
                                            header("Location: account-setup.php");
                                        } else {
                                            header("Location: main-page.php?id=" . $row['id'] . "&username=" . $row['username']);
                                            exit();
                                        }
                                    } else {
                                        echo"<script>alert('incorrect password');</script>";
                                    }
                                }
                            }
                        } ?>
                    </div>
                    <div class="col-md-6 image-logo">
                    </div>
                </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>