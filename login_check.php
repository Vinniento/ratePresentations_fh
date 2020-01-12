<?php

session_start();

if (isset($_POST['email1']) && $_POST['email1'] != '') {

    $email_form = $_POST['email1'];
    //TODO encrypt password zum vergleichen
    $pass_form = ($_POST['pwd1']);
}
try {
    //create connection to database
    include("db_connection.php");
  
    try {
        //prepare helps against SQL injections
        $query = "SELECT person_id, email, pwd, isteacher 
                        FROM persons 
                            WHERE 
                                email = :email";
        $statement = $conn->prepare($query);
        $statement->bindParam(':email', $email_form);
        $statement->execute();

        //gets row as associative array
        $users = $statement->fetch(PDO::FETCH_ASSOC);
        //print_r($users);
        if ($statement->rowCount() === 0) {
            echo "no such user";
            return;
        }
       
        if ($email_form === htmlspecialchars($users['email']) && password_verify($pass_form, $users['pwd'])) {

            //$_COOKIE["user_id"] = $users["person_id"];
            $_SESSION['person_id'] = $users['person_id'];
            $_SESSION['email'] = $users['email'];
            $_SESSION['isteacher'] = $users['isteacher'];


            if ($_SESSION['isteacher']) {
                echo "teacher login successful";
                return;
            } else {
                echo "student login successful";
                return;
            }
        } 
        else {
            echo "email or password wrong";
        }
    } catch (PDOException $error) {
        $_SESSION['login_failed'];
        echo $error;
    }
} catch (PDOException $error) {
    echo $error;
}