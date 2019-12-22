<?php
session_start();
include("db_connection.php");
if(isset($_POST['code']))
{
    $code=$_POST['code'];
try{

  

    $query = "SELECT criteria.name FROM  presentations 
    INNER JOIN  presentation_to_criteria  ON presentations.presentation_ID = presentation_to_criteria.presentation_ID 
    INNER JOIN  criteria  ON presentation_to_criteria.criteria_ID = criteria.criteria_ID  
    WHERE presentations.code = :code";
    $statement = $conn->prepare($query);
    $statement->bindParam(':code', $code);

    $statement->execute();

     //gets row as associative array
     $criterias = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($criterias);
     echo $result;

}catch(PDOException $error){
    echo $error;
}
} else{
    header("location: index.php");
}
?>