<?php
session_start();
include("db_connection.php");
$message = "";
if (!(isset($_POST['data']))) {
    echo "error";

} else {


    $arrays = $_POST['data'];
    $formname = $_POST['formname']; //vorerst zum testen später mit echtem namen

    try {
        //erstellt form
        $statement = $conn->prepare('INSERT INTO forms (name) VALUES (:name)');
        $insertSuccess = $statement->execute(array('name' => $formname));
        $message = $message . "  1.) Form name inserted = ";


        $query = "SELECT form_ID FROM forms WHERE  name = :name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $formname);
        $statement->execute();

        $form_id = $statement->fetch(PDO::FETCH_ASSOC);
       

        //insert all criteria and map the form to them
        foreach ($arrays as $value) {
            $message = $message . "  kriterium namen =  " . $value . "   einfügen \n";


            $statement = $conn->prepare('INSERT INTO criteria (name) VALUES (:name)');
            $statement->execute(array('name' => $value));
            $message = $message . "  kriterium namen =  " . $value . "   eingefügt \n";


            $query = "SELECT criteria_ID FROM criteria WHERE  name = :name";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $value);
            $statement->execute();

            $criteria_id = $statement->fetch(PDO::FETCH_ASSOC);
            $message = $message . "  kriterium namen =  " . $value . "   selectiert" . "id= " . $criteria_id['criteria_ID'] . "   form id= " . $form_id['form_ID'] . "  ";

            $statement = $conn->prepare('INSERT INTO forms_to_criteria (form_ID,criteria_ID) VALUES (:form_ID,:criteria_ID)');
            $statement->execute(array('form_ID' => $form_id['form_ID'], 'criteria_ID' => $criteria_id['criteria_ID']));
            $message = $message . "  kriterium namen =  " . $value . "   gemapt";
        }


        $message = $message . "  3.) fertig  ";

        //maps teacher to form
        $query = "SELECT person_ID FROM persons WHERE  email = :email";
        $statement = $conn->prepare($query);
        $statement->bindParam(':email', $_SESSION['email']);
        $statement->execute();

        $person_id = $statement->fetch(PDO::FETCH_ASSOC);

        $statement = $conn->prepare('INSERT INTO forms_to_persons (form_ID,person_ID) VALUES (:form_ID,:person_ID)');
        $statement->execute(array('form_ID' => $form_id['form_ID'], 'person_ID' => $person_id['person_ID']));
        $message = $message . "  5.) fertig  ";


    } catch (PDOException $exception) {
        $message = $message . $create . '\n' . $exception->getMessage();
    } catch (Exception $ex) {
        $message = $message . '\n' . 'Error = ' . $ex;
    }
    finally{
    echo $message;
    }
    //echo $array[0]."+test"; 
}
