<?php
session_start();

try {
    include("db_connection.php");
    $email=  $_SESSION['email'];
    
    $query = "SELECT forms.name, forms.form_ID FROM  forms 
    INNER JOIN  forms_to_persons  ON forms.form_ID = forms_to_persons.form_ID 
    INNER JOIN  persons  ON persons.person_ID = persons.person_ID  
    WHERE persons.email = :email";
    $statement = $conn->prepare($query);
    $statement->bindParam(':email', $email);
    
    $statement->execute();

     //gets row as associative array
     $forms = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($forms);
     echo $result;

} catch (PDOException $error) {
    echo $error;
}


?>