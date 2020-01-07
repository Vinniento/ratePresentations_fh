<?php
session_start();
include("db_connection.php");
include("random.php");
$message = "";
if (!(isset($_POST['criteria']) )) {
    echo "error";
} else {
    $array = $_POST['criteria'];
   
    foreach($array as $criteria_id => $crieria_value){
        $name_rating=randcode(8);

        //generate rating
        $statement = $conn->prepare('INSERT INTO ratings (name, rating_int, rating_str) VALUES (:name, :rating_int, :rating_str)');
        $statement->execute(array('name' => $name_rating, 'rating_int' => $crieria_value,  'rating_str' => "Int rating kein Text"));
        //select rating id
        $query = "SELECT rating_ID FROM ratings WHERE  name = :name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $name_rating);
        $statement->execute();

        $rating_id = $statement->fetchAll(PDO::FETCH_ASSOC);
        $last_rating_id = $criteria_id[count($criteria_id)-1]['rating_id'];
        //mapping raing kriterium

        $statement = $conn->prepare('INSERT INTO ratings_to_criteria (criteria_ID, rating_ID) VALUES (:criteria_ID,:rating_ID)');
        $statement->execute(array('criteria_ID' => $criteria_id, 'rating_ID' => $last_rating_id));
    }
    echo "finished without error";
}
?>
