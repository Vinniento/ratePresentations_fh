<?php
//TODO wenn ein fehler ist --> $message zurück echoen und das ausgeben?
/* var_dump( $_POST );
*/
include('random.php');
if (  isset( $_POST['firstname'] ) && isset( $_POST['lastname'] ) && isset( $_POST['email'] )  ) {

    $firstname = htmlspecialchars( $_POST['firstname'] );
    $lastname = htmlspecialchars( $_POST['lastname'] );
    $email = htmlspecialchars( ( $_POST['email'] ) );
    $pwd =randcode(8);
//mail schicken

    $pwd = password_hash((htmlspecialchars($pwd)), PASSWORD_BCRYPT);
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
    }
    else {
        try {

            $statement = $conn->prepare( 'INSERT INTO persons (firstname, lastname, email, pwd, isteacher) VALUES (:firstname, :lastname, :email,:pwd, :isteacher)' );
            $statement->execute( array( 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email,'pwd' =>$pwd, 'isteacher' => 'false' ) );
        } catch ( PDOException $exception ) 
         {
            echo $create . '<br>' . $exception->getMessage();
        }
        echo 'added and ' . $result . ' found in db';



    }
} catch( Exception $ex ) 
 {
    echo 'Error in retrieving existing data for comparison ' . $ex;
}


//header( 'Location: teacher.php' );
?>