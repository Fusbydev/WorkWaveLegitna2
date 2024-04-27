<?php
    include_once "connection.php";

    if(isset($_GET['serviceID'])) {
        $id = $_GET['serviceID'];
        $sql = "SELECT * FROM services WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $description = $row['description'];
            $title = $row['title'];
            $price = $row['price'];
        }
    }

    if(isset($_GET['id'])) {
        $id1 = $_GET['id'];
        $sql = "SELECT * FROM accounts WHERE id='$id1'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($result)) {
            $usrname = $row['username'];
        }
    }

    if(isset($_POST['hire'])) {
        // Check if the entry already exists in pending_services
        $checkQuery = "SELECT * FROM pending_services WHERE freelancer_name = '$name' AND client_username = '$usrname' AND status = 'pending'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Entry already exists, you can handle this case (e.g., display a message)
            echo "This service is already in pending status.";
        } else {
            // Entry does not exist, proceed with the insertion
            $insertQuery = "INSERT INTO pending_services (freelancer_name, title, description, price, client_username, status) VALUES('$name', '$title', '$description', '$price', '$usrname', 'pending')";
            $insertResult = mysqli_query($conn, $insertQuery);

            if (!$insertResult) {
                die("Error: " . mysqli_error($conn));
            } else {
                // Redirect or perform any other actions after successful insertion
                header("Location: main-page.php?id=$id1");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        h4 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid mx-auto" style="position: relative;">
        <div class="text-center">
            <img src="logo.png" alt="" srcset="" width="250px" height="250px" style="display: block; margin: 0 auto; margin-top: -20px;">
        </div>
        <div class="services-container">
            <div class="row" style="">
                <div class="col-md-6 mx-auto">
                    <div class="services-card" style="border-radius: 20px; border: 2px solid #000; padding: 30px;">
                        <h1 style="text-align: center;">Service Details</h1>
                        <h4>Name</h4> <?php echo $name?>
                        <h4>Title</h4> <?php echo $title?> 
                        <h4>Description</h4> <?php echo $description?>
                        <h4>Price</h4> <?php echo $price?>
                        <center style="margin-top: 10mm;">
                        <form method="POST">
                        <center style="margin-top: 10mm;">
                            <a href="main-page.php?id=<?php echo $id1 ?>"><button type="button" class="btn btn-warning">Cancel</button></a>
                            <button type="submit" class="btn btn-primary" name="hire">Hire Now</button>
                        </center>
                    </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>