<?php   
session_start();
include("db_connection.php");

if(isset($_POST['selectedStudents']) && isset($_POST['groupname'])){
    $groupName = $_POST['groupname'];//vorerst zum testen später mit echtem namen
    $selectedStudents = $_POST['selectedStudents'];

    try{
        
        $statement = $conn->prepare( 'INSERT INTO groups (group_name) VALUES (:group_name, :group_name)');
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();
        
        $query = "SELECT group_ID FROM groups WHERE  group_name = :group_name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();

        $id_group = $statement->fetch(PDO::FETCH_ASSOC);

        foreach($selectedStudents as $student)
        {
            $statement = $conn->prepare( 'INSERT INTO person_to_groups (person_ID,groups_ID) VALUES (:person_ID,:group_ID)' );
            $statement->execute( array( 'person_ID' => $student['person_ID'] ,'group_ID' => $id_group['group_ID'] ) );

        }

       //TODO NOCH NICHT FERTIG - WEIß NICHT WO DIE PRESENTATION ID HER KOMMT
        $statement = $conn->prepare( 'INSERT INTO presentation_to_person (presentation_ID,group_ID) VALUES (:presentation_ID,:group_ID)' );
        $statement->execute( array( 'presentation_ID' => $id_presentation['presentation_ID'] ,'group_ID' => $id_group['group_ID'] ) );





    }catch ( PDOException $exception ) 
        {
            $out = $out. $create ."1+". '\n' . $exception->getMessage();
        } catch(Exception $ex ) 
{
    $out = $out."2+ ".'\n'. 'Error = ' . $ex;
}
echo $out;

//echo $array[0]."+test"; 
}else{

echo "error";

}
?>
