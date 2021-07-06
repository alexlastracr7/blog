
<?php

function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = 'mydb_travel';

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    return $connection;
}

