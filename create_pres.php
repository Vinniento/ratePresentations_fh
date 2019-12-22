<?php    //verbindung teacher ->pres fehlt noch
include("db_connection.php");
include( 'random.php' );
$out="out+ \n";
if(isset($_POST['data'])){
    $arrays=$_POST['data'];
    $presname =randcode(5);//vorerst zum testen später mit echtem namen
    $code = randcode(4);

    try{
        $statement = $conn->prepare( 'INSERT INTO presentations (name, code) VALUES (:name, :code)' );
        $statement->execute( array( 'name' => $presname, 'code' => $code ) );

        $query = "SELECT presentation_ID FROM presentations WHERE  code = :code";
        $statement = $conn->prepare($query);
        $statement->bindParam(':code', $code);
        $statement->execute();


        $id = $statement->fetch(PDO::FETCH_ASSOC);
        
        foreach($arrays as $value)
        {
            $statement = $conn->prepare( 'INSERT INTO criteria (name) VALUES (:name)' );
            $statement->execute( array( 'name' => $value ) );
            
            $query = "SELECT criteria_ID FROM criteria WHERE  name = :name";
            $statement = $conn->prepare($query);
            $statement->bindParam(':name', $value);
            $statement->execute();

            $id_crit = $statement->fetch(PDO::FETCH_ASSOC);

            $statement = $conn->prepare( 'INSERT INTO presentation_to_criteria (presentation_ID,criteria_ID) VALUES (:presentation_ID,:criteria_ID)' );
            $statement->execute( array( 'presentation_ID' => $id ,'criteria_ID' => $id_crit ) );

        }

    }catch ( PDOException $exception ) 
        {
            $out = $out. $create . '\n' . $exception->getMessage();
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
