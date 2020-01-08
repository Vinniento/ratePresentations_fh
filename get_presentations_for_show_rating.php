<?php
session_start();
include("db_connection.php");
include("random.php");

   
  //  $code=strclear($code);
try{
    $email=  $_SESSION['email'];

  

    $query = "SELECT presentations.presentation_ID, presentations.name FROM  persons 
    INNER JOIN  persons_to_groups  ON persons.person_ID = persons_to_groups.person_ID 
    INNER JOIN  groups  ON persons_to_groups.group_ID = groups.group_ID 
    INNER JOIN  presentations_to_groups  ON groups.group_ID = presentations_to_groups.group_ID   
    INNER JOIN  presentations  ON presentations.presentation_ID = presentations_to_groups.presentation_ID  
    WHERE persons.email = :email";
    $statement = $conn->prepare($query);
    $statement->bindParam(':email', $email);

    $statement->execute();

     //gets row as associative array
     $presentations = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($presentations);
     echo $result;

}catch(PDOException $error){
    echo $error;
}
 
?>