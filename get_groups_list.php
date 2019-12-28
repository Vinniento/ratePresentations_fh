<?php
session_start();

try {
    include("db_connection.php");
   /*  $isteacher = false;
    $currentTeacherEmail = $_SESSION['email']; */

    //doch falsche query hier, aber vielleicht für später hilfreich
    /*$query = "SELECT groups.group_ID, groups.group_name FROM  persons 
    INNER JOIN  person_to_groups  ON persons.person_ID = person_to_groups.person_ID 
    INNER JOIN  groups  ON person_to_groups.group_ID = persons.person_ID  
    WHERE persons.email = :email";*/

    $query = "SELECT * FROM groups";
    $statement = $conn->prepare($query);
    $statement->execute();

    //gets row as associative array
    $allGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

    //print_r($allGroups);
    $allGroups = json_encode($allGroups);
     echo $allGroups;

} catch (PDOException $error) {
    echo $error;
}


