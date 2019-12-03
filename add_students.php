<?php
//TODO wenn ein fehler ist --> $message zurück echoen und das ausgeben?
/* var_dump($_POST); */ 

$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars(($_POST['email'])); //strtolower


include("db_connection.php");
try
{
    $query =  "SELECT count('email') FROM persons WHERE email= :email LIMIT 1";

    // Check if email already exists
    $stm = $conn->prepare($query);
    $stm->bindParam(':email', $email);
    $stm->execute();

    $result = $stm->fetchColumn();
    if ($result > 0) 
    {
        //echo "<script>alert('Person already exists  ')</script>";
        header("Location: teacher.php");
    }
}
catch(Exception $ex) 
{
    echo "Error in retrieving existing data for comparison " . $ex;
}

try {

    $statement = $conn->prepare("INSERT INTO persons (firstname, lastname, email, isteacher) VALUES (:firstname, :lastname, :email, :isteacher)");
    $statement->execute(array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'isteacher' => "false"));
} 
catch (PDOException $exception) 
{
    echo $create . "<br>" . $exception->getMessage();
}
    echo "added and " . $result . " found in db"
   //header("Location: teacher.php");

?>