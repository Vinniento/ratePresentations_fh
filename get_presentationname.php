<?php
session_start();

try {
    include("db_connection.php");
 
    

    if(isset($_POST['code'])){ 
        $code = $_POST['code'];
    $query = "SELECT presentation_ID, presentations.name 
            FROM presentations 
                WHERE code = :code";

    $statement = $conn->prepare($query);
    $statement->bindParam('code', $code);
    $statement->execute();

    //gets row as associative array
    $group_name = $statement->fetch(PDO::FETCH_ASSOC);
     echo $group_name['name'];
    }
    else {
        header("location: index.php");
    }
} catch (PDOException $error) {
    echo $error;
}