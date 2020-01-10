<?php
//TODO wenn ein fehler ist --> $message zurück echoen und das ausgeben?
/* var_dump( $_POST );
*/
include( 'random.php' );
if ( isset( $_POST['firstname'] ) && isset( $_POST['lastname'] ) && isset( $_POST['email'] ) ) {

    $firstname = htmlspecialchars( $_POST['firstname'] );
    $lastname = htmlspecialchars( $_POST['lastname'] );
    $email = htmlspecialchars( ( $_POST['email'] ) );
    $pass = randcode( 8 );
    //mail schicken

    //$pwd = password_hash( ( htmlspecialchars( $pass ) ), PASSWORD_BCRYPT );
    $pwd=$pass;
    //strtolower
} else {

    header( 'Location: teacher.php' );

}
include( 'db_connection.php' );
try
 {
    $query =  "SELECT count('email') FROM persons WHERE email= :email LIMIT 1";

    // Check if email already exists
    $stm = $conn->prepare( $query );
    $stm->bindParam( ':email', $email );
    $stm->execute();

    $result = $stm->fetchColumn();
    if ( $result > 0 ) 
 {
        //echo "<script>alert('Person already exists  ')</script>";
        header( 'Location: teacher.php' );
    } else {
        try {
            $pwd_encrypdet=  password_hash($pwd, PASSWORD_BCRYPT);

            $statement = $conn->prepare( 'INSERT INTO persons (firstname, lastname, email, pwd, isteacher) VALUES (:firstname, :lastname, :email,:pwd, :isteacher)' );
            $statement->execute( array( 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'pwd' =>$pwd_encrypdet, 'isteacher' => 'false' ) );

            $headers = 'From: edmin.ratepresentations@gmail.com' . '\r\n' .
            'Reply-To: edmin.ratepresentations@gmail.com' . '\r\n' .
            'X-Mailer: PHP/' . phpversion();
            $message = "You have been added as a student:  password = ". $pass 
                        .  "\n" .' Please click on the following link and reset your password:' . "\n" .
                        "http://localhost:8081/ratepresentations/change_password.php ";

            $subject = 'project work';

            mail( $email, $subject, $message, $headers );
        } 
        catch ( PDOException $exception ) 
        {
            echo $create . '<br>' . $exception->getMessage();
        }
        header('Location: teacher.php' );

    }
} catch(Exception $ex ) 
{
    echo 'Error in retrieving existing data for comparison ' . $ex;
}
?>