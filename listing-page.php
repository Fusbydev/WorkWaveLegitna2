<?php
    include_once "connection.php";

    if(isset($_GET['username'])) {
        $username = $_GET['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Accept impolyi</title>
</head>
<body>
    <div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb text-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="listing.php?username=<?php echo $username ?>" style="color: black;">Accept Client</a></li>
                    <li class="breadcrumb-item-active"><a href="#" aria-current="page" style="color: black;">Accept Employee</a></li>
                </ol>
            </nav>

        <div class="row" style="margin-top: 2cm;">
            <div class="col-md-2" style="margin-top: -1.7cm;">
                <a href="#" style="pointer-events: none;">
                    <img src="logo.png" width="250" height="250" alt="Your Image Alt Text">
                </a>
            </div>
            <div class="col-md-10" style="margin-left: -1cm;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Employer</th>
                            <th style="text-align: center;">Title</th>
                            <th style="text-align: center; padding-left: 5cm; padding-right: 5cm;">Description</th>
                            <th style="text-align: center;">Applicant Name</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_GET['username'])) {
                            $user = $_GET['username'];  
                            $res = mysqli_query($conn, "SELECT * FROM pending_clients WHERE username = '$username'");
                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo '<td class="text-center">'; echo $row["id"]; echo "</td>";
                                echo '<td class="text-center">'; echo $row["username"]; echo "</td>";
                                echo '<td class="text-center">'; echo $row["looking_for"]; echo "</td>";
                                echo "<td>"; echo $row["description"]; echo "</td>";
                                echo "<td>"; echo $row["applicants"]; echo "</td>";

                                echo '<td class="text-center"><a href="delete.php?delete=' . $row['id'] . '&username=' . $user . '" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Reject
                                    </a></td>';
                                echo "</tr>";
                            }
                        }
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
