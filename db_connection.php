<?php 
try{
    $conn = new PDO("mysql:host=localhost; dbname=ratepresentations", "oliver", "nlkj");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex){
    echo $ex;

}
try{
  //header("location: login_check.php");
//persons    
$create = "CREATE TABLE if not exists `persons` (
  `person_ID` int not null auto_increment,
  `firstname` varchar(50) not null,
  `lastname` varchar(50) not null,
  `email` varchar(70) not null unique,
  `pwd` varchar (50) not null,
  `isteacher` boolean not null,
  UNIQUE (email),
  PRIMARY KEY (`Person_ID`)
);";
$conn->exec($create);


//zu test zwecken
/* $query = "INSERT into persons 
  (firstname, lastname, email, pwd, isteacher) 
  values
  ('teacher', 'test', 'teacher@test.com', 'test', true),
  ('student', 'test', 'student@test.com', 'test', false) ";
  $statement = $conn->prepare($query);
  $statement->execute(); */
 // echo "<script>alert('Successfully inserted into persons ')</script>";
// echo "<script>alert('Table \"Person\" created successfully  ')</script>";
//  Groups*/


$create = "CREATE TABLE if not exists `groups` ( 
`group_ID` INT NOT NULL AUTO_INCREMENT , 
`group_name` VARCHAR(100) NOT NULL unique, 
PRIMARY KEY (`group_ID`)
) ENGINE = InnoDB;";
$conn->exec($create);
//echo "<script>alert('Table \"groups\" created successfully  ')</script>";
//presentation


$create = "CREATE TABLE if not exists `presentations` (
  `presentation_ID` int not null auto_increment,
  `name` varchar(70) not null,
  `code` varchar(70) not null,
  `date` varchar(70) not null,
  PRIMARY KEY (`presentation_ID`)
);";
$conn->exec($create);
//  echo "<script>alert('Table \"presentation\" created successfully  ')</script>";
//criteria

$create = "CREATE TABLE if not exists `forms` (
  `form_ID` int not null auto_increment,
  `name` varchar(70) not null,
  PRIMARY KEY (`form_ID`)
);";
$conn->exec($create);
//  echo "<script>alert('Table \"presentation\" created successfully  ')</script>";
//criteria

$create = "CREATE TABLE if not exists `criteria` (
  `criteria_ID` int not null auto_increment,
  `name` varchar(70) not null,
  PRIMARY KEY (`criteria_ID`)
);";
$conn->exec($create);
//  echo "<script>alert('Table \"criteria\" created successfully  ')</script>";
//ratings


$create = "CREATE TABLE if not exists `ratings` (
  `rating_ID` int not null auto_increment,
  `name` varchar(70) not null,
  `rating_int` int not null,
  `rating_str` varchar(70) not null,
  PRIMARY KEY (`rating_ID`)
);";
$conn->exec($create);
//   echo "<script>alert('Table \"ratings\" created successfully  ')</script>";


//person--> groups
$create = "CREATE TABLE if not exists `person_to_groups` (
  `person_ID` int not null ,
  `group_ID` int not null ,
  PRIMARY KEY (`person_ID`,`group_ID`),
  CONSTRAINT FK_Person_ID_person_to_groups FOREIGN KEY (person_ID)
  REFERENCES persons(person_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_Group_ID_person_to_groups FOREIGN KEY (group_ID)
  REFERENCES groups(group_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//   echo "<script>alert('Table \"person_to_groups\" created successfully  ')</script>";

//groups--> presention
$create = "CREATE TABLE if not exists `presentations_to_groups` (
  `presentation_ID` int not null ,
  `group_ID` int not null ,
  PRIMARY KEY (`presentation_ID`,`group_ID`),
  CONSTRAINT FK_Group_ID_presentations_to_groups FOREIGN KEY (group_ID)
  REFERENCES groups(group_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_Presentation_ID_presentations_to_groups FOREIGN KEY (presentation_ID)
  REFERENCES presentations(presentation_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//   echo "<script>alert('Table \"presentation_to_groups\" created successfully  ')</script>";

  //person--> presention
$create = "CREATE TABLE if not exists `presentation_to_person` (
  `presentation_ID` int not null ,
  `person_ID` int not null ,
  PRIMARY KEY (`presentation_ID`,`person_ID`),
  CONSTRAINT FK_Presentation_ID_presentation_to_person FOREIGN KEY (presentation_ID)
  REFERENCES presentations(presentation_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_Person_ID_presentation_to_person FOREIGN KEY (person_ID)
  REFERENCES persons(person_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
// echo "<script>alert('Table \"presentation_to_person\" created successfully  ')</script>";


   //criteria--> presention
$create = "CREATE TABLE if not exists `forms_to_criteria` (
  `form_ID` int not null ,
  `criteria_ID` int not null ,
  PRIMARY KEY (`form_ID`,`criteria_ID`),
  CONSTRAINT FK_form_ID_forms_to_criteria FOREIGN KEY (form_ID)
  REFERENCES forms(form_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_Criteria_ID_forms_to_criteria FOREIGN KEY (criteria_ID)
  REFERENCES criteria(criteria_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//  echo "<script>alert('Table \"presentation_to_criteria\" created successfully  ')</script>";

 
   //criteria--> ratings
$create = "CREATE TABLE if not exists `ratings_to_criteria` (
  `criteria_ID` int not null ,
  `rating_ID` int not null ,
  PRIMARY KEY (`criteria_ID`,`rating_ID`),
  CONSTRAINT FK_Criteria_ID_ratings_to_criteria FOREIGN KEY (criteria_ID)
  REFERENCES criteria(criteria_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_rating_ID_ratings_to_criteria FOREIGN KEY (rating_ID)
  REFERENCES ratings(rating_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//  echo "<script>alert('Table \"ratings_to_criteria\" created successfully  ')</script>";


$create = "CREATE TABLE if not exists `forms_to_presentation` (
  `presentation_ID` int not null ,
  `form_ID` int not null ,
  PRIMARY KEY (`presentation_ID`,`form_ID`),
  CONSTRAINT FK_presentation_ID_forms_to_presentation FOREIGN KEY (presentation_ID)
  REFERENCES presentations(presentation_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_form_ID_forms_to_presentation FOREIGN KEY (form_ID)
  REFERENCES forms(form_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//  echo "<script>alert('Table \"ratings_to_criteria\" created successfully  ')</script>";









$create = "CREATE TABLE if not exists `sections` (
  `section_ID` int not null auto_increment,
  `name` varchar(70) not null,
  PRIMARY KEY (`section_ID`)
);";
$conn->exec($create);



$create = "CREATE TABLE if not exists `sections_to_criteria` (
  `criteria_ID` int not null ,
  `section_ID` int not null ,
  PRIMARY KEY (`criteria_ID`,`section_ID`),
  CONSTRAINT FK_Criteria_ID_zzxx FOREIGN KEY (criteria_ID)
  REFERENCES criteria(criteria_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_section_ID_zzxx FOREIGN KEY (section_ID)
  REFERENCES sections(section_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
//  echo "<script>alert('Table \"ratings_to_criteria\" created successfully  ')</script>";

$create = "CREATE TABLE if not exists `forms_to_person` (
  `form_ID` int not null ,
  `person_ID` int not null ,
  PRIMARY KEY (`form_ID`,`person_ID`),
  CONSTRAINT FK_Presentation_ID_b FOREIGN KEY (form_ID)
  REFERENCES forms(form_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE,
  CONSTRAINT FK_Person_ID_a FOREIGN KEY (person_ID)
  REFERENCES persons(person_ID) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE
);";
 $conn->exec($create);
// echo "<script>alert('Table \"presentation_to_person\" created successfully  ')</script>";



}
catch (PDOException $ex){
  echo $ex;
}
?>