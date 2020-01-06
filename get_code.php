<?php
session_start();
include("db_connection.php");
try{
    $email = $_SESSION['email'];

    $query = "SELECT presentations.name, presentations.code, presentations.date FROM  persons 
    INNER JOIN  presentations_to_persons  ON persons.person_ID = presentations_to_persons.person_ID 
    INNER JOIN  presentations  ON presentations_to_persons.presentation_ID = presentations.presentation_ID  
    WHERE persons.email = :email";
    $statement = $conn->prepare($query);
    $statement->bindParam(':email', $email);

    $statement->execute();

     //gets row as associative array
     $codes = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($codes);
     print_r($result);

}catch(PDOException $error){
    echo $error;
}
?>