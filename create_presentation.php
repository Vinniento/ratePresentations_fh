<?php
   /* print_r($_POST['selected_groups']);
    echo($_POST['selected_form']);
    echo "\n";
    echo($_POST['presentation_date']);*/

session_start();
include("db_connection.php");
include("random.php");
$message = "";

//TODO Date is automatically set? Weil wenn man nichts eingibt, gehts tdm
if (!(isset($_POST['selected_groups']) && isset($_POST['selected_form']) && isset($_POST['presentation_date']))) {
    echo "You have to chose a group, form and a presentation date! One of them isn't chosen.";

} else {

    $form = $_POST['selected_form'];
    $groups = $_POST['selected_groups']; // array
    $presentation_date = $_POST['presentation_date'];
    $code =randcode(5);
    $presname;//=randcode(5);// zu test zwecken muss später durch echten wert ersetz werden
   

    try {

        
            foreach ($groups as $group) {
                $presname=$group."presentation";

                //create presentation
                $statement = $conn->prepare('INSERT INTO presentations (name, code, date) VALUES (:name, :code, :date)');
                $statement->execute(array('name' => $presname,'code' => $code,'date' => $presentation_date));

                $query = "SELECT presentation_ID FROM presentations WHERE  name = :name";
                $statement = $conn->prepare($query);
                $statement->bindParam(':name', $presname);
                $statement->execute();

                $PRESS_id = $statement->fetch(PDO::FETCH_ASSOC);

                //maps form to presentations
                $statement = $conn->prepare('INSERT INTO forms_to_presentations (presentation_ID, form_ID) VALUES (:presentation_ID, :form_ID)');
                $statement->execute(array('presentation_ID' => $PRESS_id['PRESS_id'], 'form_ID' => $form));
            
                //group form to presentations
                $statement = $conn->prepare('INSERT INTO presentations_to_groups (presentation_ID, group_ID) VALUES (:presentation_ID, :group_ID)');
                $statement->execute(array('presentation_ID' => $PRESS_id['PRESS_id'], 'group_ID' => $group));

                //PERSONS form to presentations
                $query = "SELECT person_ID FROM persons WHERE  email = :email";
                $statement = $conn->prepare($query);
                $statement->bindParam(':email', $_SESSION['email']);
                $statement->execute();
        
                $person_id = $statement->fetch(PDO::FETCH_ASSOC);
        
                $statement = $conn->prepare('INSERT INTO presentations_to_persons (presentation_ID,person_ID) VALUES (:presentation_ID,:person_ID)');
                $statement->execute(array('form_ID' => $PRESS_id['PRESS_id'], 'person_ID' => $person_id['person_ID']));
            }
            $message="presentation was successfully created";

    } catch (PDOException $exception) {
        $message = 'DB Error' . $exception->getMessage();
    } catch (Exception $ex) {
        $message =  'Error = ' . $ex;
    }
    finally{
    echo $message;
    }
    //echo $array[0]."+test"; 
}
?>