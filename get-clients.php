<?php
    $conn = new mysqli('localhost:3307', 'root', 'password', 'workwave');

    $sql = "SELECT id, username, looking_for, description, description FROM client_hunting";
    
    $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        echo json_encode($data);
        mysqli_close($conn);
    ?>