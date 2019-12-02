<?php
session_start();

if(isset($_POST['email']) && $_POST['email'] != '') {

$email_form = htmlspecialchars($_POST['email']);
$pass_form = htmlspecialchars($_POST['pwd']);
}
else{
    header("location: login.php");
}
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
            //TODO password verify
            if ($email_form === htmlspecialchars($users['email']) && $pass_form === $users['pwd']/*password_verify($pass_form, $users['pwd'])*/){

                //$_COOKIE["user_id"] = $users["person_id"];
                $_SESSION['person_id'] = $users['person_id'];
                $_SESSION['email'] = $users['email'];
			    $_SESSION['isteacher'] = $users['isteacher'];

                if($users['isteacher']) {
                header("location: teacher.html"); }
                else {
                    header("location: students.html");
                }
            }
            else {
                header("location: login.php");
            }
              
    }
    catch(PDOException $error) {
        $_SESSION['login_failed'];
        header("location: login.php");
        echo $error;
        }
}
    catch(PDOException $error) {
    echo $error;
    }
?>