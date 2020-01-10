<?php
//echo "oben";

session_start();

if (isset($_POST['email1']) && $_POST['email1'] != '') {

    $email_form = $_POST['email1'];
    //TODO encrypt password zum vergleichen
   // $old_pwd_form = ($_POST['oldpwd1']);
    //$new_pwd_form = ($_POST['newpwd1']);
    $old_pwd_form = password_hash(htmlspecialchars(($_POST['oldpwd1'])), PASSWORD_BCRYPT);
    $new_pwd_form = password_hash(htmlspecialchars(($_POST['newpwd1'])), PASSWORD_BCRYPT);
}
try {
    //create connection to database
    include("db_connection.php");
  
    try {
        //prepare helps against SQL injections
        $query = "SELECT person_ID, email, pwd 
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
       
        //TODO password verify
        if ($email_form === htmlspecialchars($users['email']) && password_verify($pass_form, $users['pwd']))/*password_verify($pass_form, $users['pwd']))*/ {
            $update_password = "UPDATE persons 
                SET pwd = :newpwd
                WHERE 
                    person_ID = :personid";

            $statement = $conn->prepare($update_password);
            $statement->bindParam(':newpwd', $new_pwd_form);
            $statement->bindParam('personid', $users['person_ID'], PDO::PARAM_INT);
            $statement->execute(); 
                echo "password successfully changed";
            

        } 
        else {
            echo "email or password wrong " . $old_pwd_form . " " . $new_pwd_form;
        }
    } catch (PDOException $error) {
        echo $error;
    }
} catch (PDOException $error) {
    echo $error;
}
