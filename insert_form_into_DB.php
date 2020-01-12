<?php
session_start();
include("db_connection.php");
$message = "";
if (!(isset($_POST['data']))) {
    echo "error";

} else {


    $arrays = $_POST['data'];
    $formname = htmlspecialchars($_POST['formname']); //vorerst zum testen später mit echtem namen
    
    try {
        //erstellt form
        $statement = $conn->prepare('INSERT INTO forms (name) VALUES (:name)');
        $insertSuccess = $statement->execute(array('name' => $formname));
       // $message.= "  1.) Form name inserted = ";


        $query = "SELECT form_ID FROM forms WHERE  name = :name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $formname);
        $statement->execute();

        $form_id = $statement->fetchAll(PDO::FETCH_ASSOC);
        $last_form_id = $form_id[count($form_id)-1]['form_ID'];

        //insert all criteria and map the form to them
        foreach ($arrays as $value) {
            echo "Formname = " . $formname . "\n";
            print_r($value) . "\n";

        $isfeedback = $value['type'] == "range" ? 0 : 1;
        $criteria_name = $isfeedback == 1 ? $value['feedbackname'] : $value['rangename'];
        echo "ISFEEDBACK = " . $isfeedback;
        // $message .= "  kriterium namen =  " . $criteria_name . "   einfügen \n";
          
            $statement = $conn->prepare('INSERT INTO criteria (name, isfeedback) VALUES (:name, :isfeedback)');
            $statement->execute(array('name' => $criteria_name, 'isfeedback' => $isfeedback));

          // $message .= "  kriterium namen =  " . $criteria_name . "   eingefügt \n";


            $query = "SELECT criteria_ID FROM criteria WHERE  name = :name";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $criteria_name);
            $statement->execute();

            $criteria_id = $statement->fetchAll(PDO::FETCH_ASSOC);
            $last_criteria_id = $criteria_id[count($criteria_id)-1]['criteria_ID'];
          // $message .= "  kriterium namen =  " . $criteria_name . "   selectiert" . "id= " . $last_criteria_id . "   form id= " . $last_form_id . "  ";

            $statement = $conn->prepare('INSERT INTO forms_to_criteria (form_ID,criteria_ID) VALUES (:form_ID,:criteria_ID)');
            $statement->execute(array('form_ID' => $last_form_id, 'criteria_ID' => $last_criteria_id));
           // $message .= "  kriterium namen =  " . $criteria_name . "   gemapt";
        }


       // $message .= "  3.) Kriterien eingefügt  ";

        //maps teacher to form
        $query = "SELECT person_ID FROM persons WHERE  email = :email";
        $statement = $conn->prepare($query);
        $statement->bindParam(':email', $_SESSION['email']);
        $statement->execute();

        $person_id = $statement->fetch(PDO::FETCH_ASSOC);

        $statement = $conn->prepare('INSERT INTO forms_to_persons (form_ID,person_ID) VALUES (:form_ID,:person_ID)');
        $statement->execute(array('form_ID' => $last_form_id, 'person_ID' => $person_id['person_ID']));
       // $message .= "  5.) fertig  ";


    } catch (PDOException $exception) {
        $message .= $create . '\n' . $exception->getMessage();
    } catch (Exception $ex) {
        $message .= '\n' . 'Error = ' . $ex;
    }
    finally{
    echo $message;
    }
    //echo $array[0]."+test"; 
}
