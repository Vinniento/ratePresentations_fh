<?php 
try{
    $conn = new PDO("mysql:host=localhost; dbname=ratepresentations", "oliver", "nlkj");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex){
    echo $ex;

}
//Datenbanken anlegen 

try {

    // set the PDO error mode to exception
    //persons
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
        //  Groups
     
    
        $create = "CREATE TABLE if not exists `groups` (
            `group_ID` int not null auto_increment,
            `name` varchar(70) not null,
            PRIMARY KEY (`groups_ID`)
          );";
        $conn->exec($create);
        echo "<script>alert('Table \"Person\" created successfully  ')</script>";
          //presentation
      
    
        $create = "CREATE TABLE if not exists `presentation` (
            `presentation_ID` int not null auto_increment,
            `name` varchar(70) not null,
            PRIMARY KEY (`presentation_ID`)
          );";
        $conn->exec($create);
        echo "<script>alert('Table \"Person\" created successfully  ')</script>";
        //criteria
     
    
        $create = "CREATE TABLE if not exists `criteria` (
            `criteria_ID` int not null auto_increment,
            `name` varchar(70) not null,
            PRIMARY KEY (`criteria_ID`)
          );";
        $conn->exec($create);
        echo "<script>alert('Table \"Person\" created successfully  ')</script>";
        //ratings
        
    
        $create = "CREATE TABLE if not exists `ratings` (
            `ratings_ID` int not null auto_increment,
            `name` varchar(70) not null,
            `rating_int` int not null,
            `rating_str` varchar(70) not null,
            PRIMARY KEY (`ratings_ID`)
          );";
        $conn->exec($create);
        echo "<script>alert('Table \"Person\" created successfully  ')</script>";

        //person--> groups
        $create = "CREATE TABLE if not exists `person_to_groups` (
            `person_ID` int not null ,
            `group_ID` int not null ,
            PRIMARY KEY (`person_ID`,`group_ID`)
          );";
           $conn->exec($create);
           echo "<script>alert('Table \"Person\" created successfully  ')</script>";


        //groups--> presention
        $create = "CREATE TABLE if not exists `presentation_to_groups` (
            `presentation_ID` int not null ,
            `group_ID` int not null ,
            PRIMARY KEY (`presentation_ID`,`group_ID`)
          );";
           $conn->exec($create);
           echo "<script>alert('Table \"Person\" created successfully  ')</script>";

            //person--> presention
        $create = "CREATE TABLE if not exists `presentation_to_person` (
            `presentation_ID` int not null ,
            `person_ID` int not null ,
            PRIMARY KEY (`presentation_ID`,`person_ID`)
          );";
           $conn->exec($create);
           echo "<script>alert('Table \"Person\" created successfully  ')</script>";


             //criteria--> presention
        $create = "CREATE TABLE if not exists `presentation_to_criteria` (
            `presentation_ID` int not null ,
            `criteria_ID` int not null ,
            PRIMARY KEY (`presentation_ID`,`criteria_ID`)
          );";
           $conn->exec($create);
           echo "<script>alert('Table \"Person\" created successfully  ')</script>";

           
             //criteria--> ratings
        $create = "CREATE TABLE if not exists `ratings_to_criteria` (
            `criteria_ID` int not null ,
            `ratings_ID` int not null ,
            PRIMARY KEY (`criteria_ID`,`ratings_ID`)
          );";
           $conn->exec($create);
           echo "<script>alert('Table \"Person\" created successfully  ')</script>";

} catch (PDOException $exception) {
    echo $create . "<br>" . $exception->getMessage();
}





?>