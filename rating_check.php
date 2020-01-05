<?php
session_start();
include("db_connection.php");
$message = "";
if (!(isset($_POST['criteria']) && isset($_POST['criteria_value']))) {
    echo "error";

} else {



    echo "ja";
}
























?>