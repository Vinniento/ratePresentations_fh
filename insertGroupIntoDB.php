<?php   
session_start();
include("db_connection.php");
$message="";
try {
    if(!(isset($_POST['selectedStudents']) && isset($_POST['groupname']))){
        
        $message = "students not selected or groupname not entered";
    }
    else{
        $groupName = $_POST['groupname'];//vorerst zum testen später mit echtem namen
        $selectedStudents = $_POST['selectedStudents'];
        $statement = $conn->prepare( 'INSERT INTO groups (group_name) VALUES (:group_name)');
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();
        
        $query = "SELECT group_ID FROM groups WHERE  group_name = :group_name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();

        $id_group = $statement->fetch(PDO::FETCH_ASSOC);

        foreach($selectedStudents as $student)
        {
            $statement = $conn->prepare( 'INSERT INTO person_to_groups (person_ID,group_ID) VALUES (:person_ID,:group_ID)' );
            $statement->execute( array( 'person_ID' => $student ,'group_ID' => $id_group['group_ID'] ) );
        }
        $message = "group created and students successfully added";

        //TODO NOCH NICHT FERTIG - WEIß NICHT WO DIE PRESENTATION ID HER KOMMT
        //  $statement = $conn->prepare( 'INSERT INTO presentation_to_person (presentation_ID,group_ID) VALUES (:presentation_ID,:group_ID)' );
        //  $statement->execute( array( 'presentation_ID' => $id_presentation['presentation_ID'] ,'group_ID' => $id_group['group_ID'] ) );

        }
        
}
catch (PDOException $exception ) 
    {
        $message .= $exception->getMessage();
    } 
catch(Exception $ex ) 
    {
        $message .= $ex;
    }
finally{
    echo $message;
    return;

}