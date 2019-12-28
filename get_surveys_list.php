<?php
session_start();

try {
    include("db_connection.php");
    $email=  $_SESSION['email'];
    
    $query = "SELECT presentations.name, presentations.presentation_ID FROM  presentations 
    INNER JOIN  presentation_to_person  ON presentations.presentation_ID = presentation_to_person.presentation_ID 
    INNER JOIN  persons  ON persons.person_ID = persons.person_ID  
    WHERE persons.email = :email";
    $statement = $conn->prepare($query);
    $statement->bindParam(':email', $email);

    
    $statement->execute();

     //gets row as associative array
     $criterias = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($criterias);
     echo $result;

    //gets row as associative array
  //  $allGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

  //  print_r($allGroups);
    /* $students = json_encode($users);
     echo $students;*/

} catch (PDOException $error) {
    echo $error;
}


