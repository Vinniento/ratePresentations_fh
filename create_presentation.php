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
    $code = randcode(5);
    $presentation_name = ""; //=randcode(5);// zu test zwecken muss später durch echten wert ersetz werden


    try {

        //PERSONS form to presentations
        $query = "SELECT person_ID FROM persons WHERE  email = :email";
        $statement = $conn->prepare($query);
        $statement->bindParam(':email', $_SESSION['email']);
        $statement->execute();
        $person_ID = $statement->fetch(PDO::FETCH_ASSOC);
        
        foreach ($groups as $group_ID) {
            
            $query = "SELECT group_name FROM groups WHERE  group_ID = :group_ID";
            $statement = $conn->prepare($query);
            $statement->bindParam(':group_ID', $group_ID);
            $statement->execute();

            $group_name = $statement->fetch(PDO::FETCH_ASSOC);

            $presentation_name = $group_name['group_name'] . ".presentation";

            //create presentation
            $statement = $conn->prepare('INSERT INTO presentations (name, code, date) VALUES (:name, :code, :date)');
            $statement->execute(array('name' => $presentation_name, 'code' => $code, 'date' => $presentation_date));

            $query = "SELECT presentation_ID FROM presentations WHERE  name = :name";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $presentation_name);
            $statement->execute();

            $presentation_ID = $statement->fetch(PDO::FETCH_ASSOC);

            //maps form to presentations
            $statement = $conn->prepare('INSERT INTO forms_to_presentations (presentation_ID, form_ID) VALUES (:presentation_ID, :form_ID)');
            $statement->execute(array('presentation_ID' => $presentation_ID['presentation_ID'], 'form_ID' => $form));

            //group form to presentations
            $statement = $conn->prepare('INSERT INTO presentations_to_groups (presentation_ID, group_ID) VALUES (:presentation_ID, :group_ID)');
            $statement->execute(array('presentation_ID' => $presentation_ID['presentation_ID'], 'group_ID' => $group_ID));
            sleep(2);

            $statement = $conn->prepare('INSERT INTO presentations_to_persons (presentation_ID,person_ID) VALUES (:presentation_ID,:person_ID)');
            $statement->execute(array('presentation_ID' => $presentation_ID['presentation_ID'], 'person_ID' => $person_ID['person_ID']));
        }
        $message = "presentation was successfully created";
    } catch (PDOException $exception) {
        $message = 'DB Error: ' . $exception->getMessage();
    } catch (Exception $ex) {
        $message =  'Error = ' . $ex;
    } finally {
        echo $message;
    }
    //echo $array[0]."+test"; 
}
