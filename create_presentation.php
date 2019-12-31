<?php
    print_r($_POST['selected_groups']);
    echo($_POST['selected_form']);
    echo "\n";
    echo($_POST['presentation_date']);

session_start();
include("db_connection.php");
$message = "";

//TODO Date is automatically set? Weil wenn man nichts eingibt, gehts tdm
if (!(isset($_POST['selected_groups']) && isset($_POST['selected_form']) && isset($_POST['presentation_date']))) {
    echo "You have to chose a group, form and a presentation date! One of them isn't chosen.";

} else {

    $form = $_POST['selected_form'];
    $groups = $_POST['selected_groups']; // array
    $presentation_date = $_POST['presentation_date'];
   

    try {

        
            foreach ($groups as $group) {

                //create presentation
                //TODO hier fehlt noch der presentation_name
                $statement = $conn->prepare('INSERT INTO presentations (name) VALUES (:name)');
                $statement->execute(array('name' => $presentation_name['prese_ID']));


                //maps groups to presentations
                $query = "SELECT group_ID FROM groups WHERE  group_name = :group_name";
                    $statement = $conn->prepare($query);
                    $statement->bindParam(':group_name', $);
                    $statement->execute();
                    $criteria_id = $statement->fetch(PDO::FETCH_ASSOC);

    
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




        //erstellt form
        $statement = $conn->prepare('INSERT INTO forms (name) VALUES (:name)');
        $insertSuccess = $statement->execute(array('name' => $formname));
        $message = $message . "  1.) Form name inserted = ";


        $query = "SELECT form_ID FROM forms WHERE  name = :name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':name', $formname);
        $statement->execute();

        $form_id = $statement->fetch(PDO::FETCH_ASSOC);
       

       


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
