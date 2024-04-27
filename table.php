<?php
    include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
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
                            <th style="text-align: center;">Freelancer Name</th>
                            <th style="text-align: center;">Title</th>
                            <th style="text-align: center; padding-left: 5cm; padding-right: 5cm;">Description</th>
                            <th style="text-align: center;">Client Name</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_GET['username'])) {
                            $user = $_GET['username'];
                            $res = mysqli_query($conn, "SELECT * FROM pending_services WHERE client_username = '$user'");
                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo '<td class="text-center">'; echo $row["id"]; echo "</td>";
                                echo '<td class="text-center">'; echo $row["freelancer_name"]; echo "</td>";
                                echo '<td class="text-center">'; echo $row["title"]; echo "</td>";
                                echo "<td>"; echo $row["description"]; echo "</td>";
                                echo "<td>"; echo $row["client_username"]; echo "</td>";
                                echo "<td>"; echo $row["status"]; echo "</td>";
                                echo '<td class="text-center"><a href="delete.php?delete=' . $row['id'] . '&username=' . $user . '" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-trash"></span> Cancel
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
