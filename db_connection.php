<?php 
try{
    $conn = new PDO("mysql:host=localhost; dbname=ratepresentations", "oliver", "nlkj");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex){
    echo $ex;

}
?>