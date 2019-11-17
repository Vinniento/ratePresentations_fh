<?php 
try
{
    //create connection to database
    include("db_connection.php");

    try {

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $create = "CREATE TABLE if not exists `persons` (
                `person_ID` int not null auto_increment,
                `firstname` varchar(50) not null,
                `lastname` varchar(50) not null,
                `email` varchar(70) not null,
                `pwd` varchar (50), /*TODO not null */
                `isteacher` boolean not null,
                PRIMARY KEY (`Person_ID`)
              );";
            $conn->exec($create);
            echo "<script>alert('Table \"Person\" created successfully  ')</script>";
                
    } catch (PDOException $exception) {
        echo $create . "<br>" . $exception->getMessage();
    }
    //nur für testzwecke
    $query = "INSERT into persons 
    (firstname, lastname, email, pwd, isteacher) 
    values
    ('teacher', 'test', 'teacher@test.com', 'test', true),
    ('student', 'test', 'student@test.com', 'test', false) ";
    $statement = $conn->prepare($query);
    $statement->execute();
    echo "<script>alert('Successfully inserted into persons ')</script>";
}
    catch(PDOException $error) 
    {
        echo $error;
    }
    ?>