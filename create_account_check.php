<?php

if(isset($_POST['firstname']) && isset($_POST['lasttname']) && isset($_POST['mail']) && isset($_POST['institution']) && isset($_POST['password']) && isset($_POST['password1']))  {
$firstname_form = htmlspecialchars($_POST['firstname']);
$lasttname_form = htmlspecialchars($_POST['lasttname']);
$mail_form = htmlspecialchars($_POST['mail']);
$institution_form = htmlspecialchars($_POST['institution']);
$password_form = htmlspecialchars($_POST['password']);
$password1_form = htmlspecialchars($_POST['password1']);

if($password_form != $password1_form){
    header("location: createaccount.html");
}else{
    $pwd = password_hash((htmlspecialchars($_POST['password'])), PASSWORD_BCRYPT);
}

}else
{
    echo "pwd falsch!";
    header("location: createaccount.html");
}

$isteacher_form = True;


try {
    include("db_connection.php");

$statement = $conn->prepare("INSERT INTO persons (firstname, lastname, email, pwd, isteacher) VALUES (:firstname, :lastname, :email, :pwd, :isteacher)");
$statement->execute(array('firstname' => $firstname_form, 'lastname' => $lasttname_form,  'email' => $mail_form, 'pwd' => $pwd, 'isteacher' => $isteacher));
} catch (PDOException $exception) {
    echo $create . "<br>" . $exception->getMessage();
}

?>
