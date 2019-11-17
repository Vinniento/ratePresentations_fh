<?php
session_start();

/*TODO Hinzufügen von "is submit set usw"
*/

$email_form = htmlspecialchars($_POST['email']);
$pass_form = htmlspecialchars($_POST['pwd']);

try
{
    //create connection to database
        include("db_connection.php");

    try 
    {
            //prepare helps against SQL injections
            $query = "SELECT person_id, email, pwd, isteacher 
                        FROM persons 
                            WHERE email = :email";
            $statement = $conn->prepare($query);

            $statement->bindParam(':email', $email_form);

            $statement->execute();

            //gets row as associative array
            $users = $statement->fetch(PDO::FETCH_ASSOC);
            //print_r($users);
            
            //if ($email_form === $users['email'] && password_verify($pass_form, $users['pwd']) == true){
                if ($email_form === htmlspecialchars($users['email']) && $pass_form === htmlspecialchars($users['pwd'])){

                //$_COOKIE["user_id"] = $users["person_id"];
                $_SESSION['email'] = $email_form;
                $_SESSION['pwd'] = $pass_form;
			    $_SESSION['isteacher'] = $users['isteacher'];

                if($users['isteacher']) {
                header("location: teacher.html"); }
                else {
                    header("location: students.html");
                }
            }
            else {

            }
          
           
    }
    catch(PDOException $error) {
        echo $error;
        }
}

    catch(PDOException $error) {
    echo $error;
    }
    finally {
        
    }
?>