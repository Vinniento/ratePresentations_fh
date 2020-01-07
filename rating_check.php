<?php
session_start();
include("db_connection.php");
include("random.php");
$message = "";
if (!(isset($_POST['criteria']) )) {
    echo "error no criteria";
} else {
    $array = $_POST['criteria'];
   

    
    try {
    foreach($array as $criteria_id => $crieria_value){
        $name_rating=randcode(8);
        $message=$message." id= ".$criteria_id." value= ".$crieria_value;
        //generate rating
        $statement = $conn->prepare('INSERT INTO ratings (name, rating_int, rating_str) VALUES (:name, :rating_int, :rating_str)');
        $statement->execute(array('name' => $name_rating, 'rating_int' => $crieria_value,  'rating_str' => "Int rating kein Text"));
        $message=$message."insert von "." id= ".$criteria_id."fertg";
        //select rating id
        $query = "SELECT rating_ID FROM ratings WHERE  name = :name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $name_rating);
        $statement->execute();
        $message=$message."select von "." id= ".$criteria_id."fertg";
        $rating_id = $statement->fetchAll(PDO::FETCH_ASSOC);
        $last_rating_id = $rating_id[count($rating_id)-1]['rating_ID'];
        //mapping raing kriterium

        $statement = $conn->prepare('INSERT INTO ratings_to_criteria (criteria_ID, rating_ID) VALUES (:criteria_ID,:rating_ID)');
        $statement->execute(array('criteria_ID' => $criteria_id, 'rating_ID' => $last_rating_id));
        $message=$message."mapping von "." id= ".$criteria_id."fertg";
    }
    echo "finished without error " .$message;
} catch (PDOException $exception) {
    $message ="error".$exception->getMessage();
} catch (Exception $ex) {
    $message ="error".$ex->getMessage();
}
finally{
echo $message;
}
}
?>
