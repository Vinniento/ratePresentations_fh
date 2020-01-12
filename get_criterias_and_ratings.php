<?php
session_start();
include("db_connection.php");
include("random.php");
if (isset($_GET['id'])) {
    $pres_id = $_GET['id'];
    //  $code=strclear($code);
    $array=array();
    try {

        $query = "SELECT criteria.name, criteria.criteria_ID FROM  presentations 
    INNER JOIN  forms_to_presentations  ON presentations.presentation_ID = forms_to_presentations.presentation_ID 
    INNER JOIN  forms  ON forms_to_presentations.form_ID = forms.form_ID 
    INNER JOIN  forms_to_criteria  ON forms_to_criteria.form_ID = forms.form_ID   
    INNER JOIN  criteria  ON forms_to_criteria.criteria_ID = criteria.criteria_ID  
    WHERE presentations.presentation_ID = :presentation_ID";
        $statement = $conn->prepare($query);
        $statement->bindParam(':presentation_ID', $pres_id);

        $statement->execute();

        //gets row as associative array t
        $criterias = $statement->fetchAll(PDO::FETCH_ASSOC);


        foreach ($criterias as $criteria) {


            $query = "SELECT AVG(ratings.rating_int) FROM  criteria 
        INNER JOIN  ratings_to_criteria  ON criteria.criteria_ID = ratings_to_criteria.criteria_ID 
        INNER JOIN  ratings  ON ratings.rating_ID = ratings.rating_ID 
        WHERE criteria.criteria_ID = :criteria_ID AND criteria.isfeedback = 0";
            $statement = $conn->prepare($query);
            $statement->bindParam(':criteria_ID', $criteria['criteria_ID']);

            $statement->execute();
            $avrage_rating= $statement->fetchAll(PDO::FETCH_ASSOC);

            $array[$criteria['name']]=$avrage_rating;
        }

        echo json_encode($array);

    } catch (PDOException $error) {

        echo $error->getMessage();
    } catch (Exception $ex) {
        
        echo "error".$ex->getMessage();
    }
    
} else {
    echo "error kein id empfangen";
}

?>