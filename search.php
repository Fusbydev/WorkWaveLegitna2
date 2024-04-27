<?php
include_once "connection.php";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM services WHERE name LIKE '%$search%' OR title LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%'";
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $searchResults = array(); // Array to store search results

    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row; // Add each result to the array
    }

    // Return JSON-encoded array
    header('Content-Type: application/json');
    echo json_encode($searchResults);
}

mysqli_close($conn);
?>
