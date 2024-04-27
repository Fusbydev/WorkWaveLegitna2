<?php
    include "connection.php";

    if (isset($_GET['serviceID'])) {
        $service_id = $_GET['serviceID'];
        $sql = "SELECT * FROM client_hunting WHERE id = '$service_id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['looking_for'];
            $name = $row['username'];
            $description = $row['description'];
        }
    }

    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        $sql = "SELECT id, username FROM accounts WHERE id = '$cid'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)){
            $user_id = $row['id'];
            $user_username = $row['username'];
        }   
    }
    if(isset($_POST['apply'])) {
        // Check if the entry already exists in pending_services
        $checkQuery = "SELECT * FROM client_hunting WHERE id = '$service_id'";
        $checkResult = mysqli_query($conn, $checkQuery);
            
            if($row = mysqli_fetch_assoc($checkResult)) {
                $insertQuery = "INSERT INTO pending_clients (username, looking_for, description, applicants) 
                                    VALUES('$name', '$title', '$description', '$user_username')";
                $insertResult = mysqli_query($conn, $insertQuery);
            }

            if (!$insertResult) {
                die("Error: " . mysqli_error($conn));
            } else {
                // Redirect or perform any other actions after successful insertion
                header("Location: main-page-client.php?id=$cid");
                exit();
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
            <img src="logo.jpg" alt="" srcset="" width="250px" height="250px" style="display: block; margin: 0 auto; margin-top: -20px;">
        </div>
        <div class="services-container">
        <div class="row" style="">
            <div class="col-md-6 mx-auto">
                <div class="services-card" style="border-radius: 20px; border: 2px solid #000; padding: 30px;">
                    <h1 style="text-align: center;">Job Details</h1>
                    <h4>Employer</h4> <?php echo $name?>
                    <h4>Job Title</h4> <?php echo $title?> 
                    <h4>Description</h4> <?php echo $description?>
                    <form method="post" action="">
                        <center style="margin-top: 10mm;">
                            <a href="main-page-client.php?id=<?php echo $cid ?>"><button type="button" class="btn btn-warning" onclick="goToMainPage()">Cancel</button></a>
                            <input type="submit" class="btn btn-primary" name="apply" value="Apply Now">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>