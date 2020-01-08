<?php
session_start();
include("db_connection.php");
include("random.php");
if(isset($_POST['id']))
{
    $criteria_ID=$_POST['id'];
  //  $code=strclear($code);
try{

  

    $query = "SELECT ratings.rating_ID, ratings.name , ratings.rating_int , ratings.rating_str FROM  criteria 
    INNER JOIN  ratings_to_criteria  ON criteria.criteria_ID = ratings_to_criteria.criteria_ID 
    INNER JOIN  ratings  ON ratings.rating_ID = ratings.rating_ID 
    WHERE criteria.criteria_ID = :criteria_ID";
    $statement = $conn->prepare($query);
    $statement->bindParam(':criteria_ID', $criteria_ID);

    $statement->execute();

     //gets row as associative array
     $ratings = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($ratings);
     echo $result;

}catch(PDOException $error){
    echo $error;
}
} else{
  //  header("location: index.php");
  echo "code falsch definiert";
}
?>