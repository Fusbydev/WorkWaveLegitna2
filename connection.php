<?php
    $db_server ="localhost:3307";
    $db_user = "root";
    $db_pass = "password";
    $db_name = "workwave";

    $conn = "";

    
    try {
        $conn = mysqli_connect( $db_server, 
                                $db_user, 
                                $db_pass, 
                                $db_name);

    
    } catch(mysqli_sql_exception) {
        echo "could not connect!";
    }
    
?>