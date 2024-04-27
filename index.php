<?php
    include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>WorkWave-LogIn</title>
</head>
<body>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-md-6 login">
            <form action="" method="post">
                <div class="mb-3">
                    <input type="username" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Re-enter Password" name="pass_confirm">
                </div>
                <p>Already have an account? <a href="login-page.php">Click here</a></p>
                <button class="btn btn-primary" name="register">Register</button>
            </form>
                        <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['register'])) {
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['pass'];
                                $confirmPassword = $_POST['pass_confirm'];
                                if(strlen($password) < 8) {
                                    echo "password too short";
                                } else {
                                    if($password == $confirmPassword) {
                                        $sql = "INSERT INTO accounts (username, email, password, setup) VALUES ('$username','$email','$password','1')";
                                    if (mysqli_query($conn, $sql)) {
                                        echo "<script>alert('Registered successfully'); window.location.href='login-page.php';</script>";
                                        exit();  // Make sure to exit after the script
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                } else {
                                    echo "<p class='btn-warning'>password do not match</p>";
                                    
                                } 
                                }
                                
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6 image-logo">

                    </div>
                </div>

        </div>
        


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>