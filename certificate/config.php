<?php
$host_name = "localhost";
$database = "news";
$username = "root"; 
$password = "pSBNVz2TpBMEiR";


try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>
