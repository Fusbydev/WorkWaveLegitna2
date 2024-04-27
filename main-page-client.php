<?php
include_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM accounts WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
        $id = $row['id'];

    }
}  
if(isset($_POST['upload'])) {
    $job = $_POST['job'];
    $des = $_POST['des'];

    $insertQuery = "INSERT INTO client_hunting (username, looking_for, description) VALUES ('$username', '$job', '$des')";
                $insertResult = mysqli_query($conn, $insertQuery);
                if (!$insertResult) {
                    die("Error: " . mysqli_error($conn));
                }   
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="main-page-client.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Document</title>
    <style>
        .d-block {
            color: black!important;
        }

        /* Adjust the search input responsiveness */
        .form input[type="search"] {
            max-width: 100%;
            margin-left:10px;
        }

        /* Style offcanvas */
        .offcanvas-body {
            padding: 1rem;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .form input[type="search"] {
                max-width: 100%;
            }
        }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="logo.png" alt="" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <form class="d-flex mt-2 form" role="search">
        <input class="form-control me-2" type="search" placeholder="Search Clients..." aria-label="Search"">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
            <a class="nav-link home" href="#"><img src="home (2).png" alt=""></a>
            <span class="d-block">Home</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listing.php?username=<?php echo "$username " ?>"><img src="booking.png" alt=""></a>
            <span class="d-block">Bookings</span>
        </li>
        <li class="nav-item">
            <a class="nav-link profile" href="editprofile-clients.php?id=<?php echo $id; ?>"><img src="user.png" alt="" id="profile" name="prof"></a>
            <span class="d-block">Profile</span>
        </li>
        </ul>
    </div>
    </div>
</div>
</nav>
<!--main panel-->

<div class="container">

<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" id="add"><i class="bi bi-plus-circle-fill"></i></button>
    
    <div class="row" id="dataContainer">
            
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter the client you want</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-center">
    <form method="POST">
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">you are looking for?</label>
            <input type="text" class="form-control1" id="client_request" name="job">
        </div>
        </div>
        <div class="mb-3 text-center">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control1" id="message-text" name="des"></textarea>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="upload">Send message</button>
        </div>
    </form>
    </div>
</div>
</div>
<!--end of add modal-->  
            <!--end of hire modal   -->

            <script>
        var mainPageId = <?php echo json_encode($id); ?>;
        var mainPageUsername = <?php echo json_encode($username); ?>;
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="main-page.client.js"></script>
</body>
</html>