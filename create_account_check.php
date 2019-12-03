<?php

if (isset($_POST['firstname']) && isset($_POST['lasttname']) && isset($_POST['mail'])  && isset($_POST['pwd']) && isset($_POST['pwd1'])) {
    $firstname_form = htmlspecialchars($_POST['firstname']);
    $lasttname_form = htmlspecialchars($_POST['lasttname']);
    $mail_form = htmlspecialchars($_POST['mail']);
    
    $password_form = htmlspecialchars($_POST['pwd']);
    $password1_form = htmlspecialchars($_POST['pwd1']);

    if ($password_form !== $password1_form) {
        header("location: createaccount.html");
    } else {
        $pwd = password_hash((htmlspecialchars($_POST['pwd'])), PASSWORD_BCRYPT);
    }
} else {
    echo "pwd falsch!";
    header("location: teacher.php");
}

$isteacher_form = True;


try {
    include("db_connection.php");

    $statement = $conn->prepare("INSERT INTO persons (firstname, lastname, email, pwd, isteacher) VALUES (:firstname, :lastname, :email, :pwd, :isteacher)");
    $statement->execute(array('firstname' => $firstname_form, 'lastname' => $lasttname_form,  'email' => $mail_form, 'pwd' => $pwd, 'isteacher' => $isteacher_form));
    header("location: index.php");
} catch (PDOException $exception) {
    echo $create . "<br>" . $exception->getMessage();
}
