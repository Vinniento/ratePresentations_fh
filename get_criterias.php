<?php
session_start();
include("db_connection.php");
include("random.php");
if(isset($_POST['code']))
{
    $code=$_POST['code'];
  //  $code=strclear($code);
try{

  

    $query = "SELECT criteria.name, criteria.isfeedback, criteria.criteria_ID FROM  presentations 
    INNER JOIN  forms_to_presentations  ON presentations.presentation_ID = forms_to_presentations.presentation_ID 
    INNER JOIN  forms  ON forms_to_presentations.form_ID = forms.form_ID 
    INNER JOIN  forms_to_criteria  ON forms_to_criteria.form_ID = forms.form_ID   
    INNER JOIN  criteria  ON forms_to_criteria.criteria_ID = criteria.criteria_ID  
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
  //  header("location: index.php");
  echo "code falsch definiert";
}
?>