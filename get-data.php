    <?php
    $conn = new mysqli('localhost:3307', 'root', 'password', 'workwave');

    $sql = "SELECT id, title, name, description, price FROM services";
    
    $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        echo json_encode($data);
        mysqli_close($conn);
    ?>