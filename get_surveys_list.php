<?php
session_start();

try {
    include("db_connection.php");
   $uery = "SELECT * FROM groups";
    $statement = $conn->prepare($query);
    $statement->execute();

    //gets row as associative array
    $allGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

    print_r($allGroups);
    /* $students = json_encode($users);
     echo $students;*/

} catch (PDOException $error) {
    echo $error;
}


