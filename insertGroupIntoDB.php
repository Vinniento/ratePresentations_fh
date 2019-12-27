<?php   
session_start();
include("db_connection.php");
$out="out+ \n";
if(isset($_POST['selectedStudents']) && isset($_POST['groupname'])){
    $groupName = $_POST['groupname'];//vorerst zum testen später mit echtem namen
    $selectedStudents = $_POST['selectedStudents'];

    try{
        $out = $out."einfügen 1"."gruppe name=".$groupName;
        $statement = $conn->prepare( 'INSERT INTO groups (group_name) VALUES (:group_name)');
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();
        $out = $out."einfügen 2";
        
        $query = "SELECT group_ID FROM groups WHERE  group_name = :group_name";
        $statement = $conn->prepare($query);
        $statement->bindParam(':group_name', $groupName);
        $statement->execute();
        $out = $out."einfügen 3";

        $id_group = $statement->fetch(PDO::FETCH_ASSOC);

        foreach($selectedStudents as $student)
        {
            $out=$out."   student[person_ID]=". $student['person_ID'] ."    id_group[group_ID]=".$id_group['group_ID']."   ";
            $statement = $conn->prepare( 'INSERT INTO person_to_groups (person_ID,groups_ID) VALUES (:person_ID,:group_ID)' );
            $statement->execute( array( 'person_ID' => $student['person_ID'] ,'group_ID' => $id_group['group_ID'] ) );

        }
        $out = $out."einfügen 4";

       //TODO NOCH NICHT FERTIG - WEIß NICHT WO DIE PRESENTATION ID HER KOMMT
     //   $statement = $conn->prepare( 'INSERT INTO presentation_to_person (presentation_ID,group_ID) VALUES (:presentation_ID,:group_ID)' );
      //  $statement->execute( array( 'presentation_ID' => $id_presentation['presentation_ID'] ,'group_ID' => $id_group['group_ID'] ) );





    }catch ( PDOException $exception ) 
        {
            $out = $out."sql error= " . '\n' . $exception->getMessage();
        } catch(Exception $ex ) 
{
    $out = $out.'\n'. 'Error = ' . $ex;
}
echo $out;

//echo $array[0]."+test"; 
}else{

echo "error";

}
?>
