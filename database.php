<?php

$dbMechine = "localhost";
$userName = "root";
$pass = "";
$dbName = "form";
$con = "";

try{
    $con = mysqli_connect($dbMechine, $userName, $pass, $dbName);
}catch(mysqli_sql_exception)
{
    echo "database is not connected";
}

?>

