<?php 
$con = mysql_connect("localhost","root",""); 
if (!$con)   
{   
    die('Could not connect: ' . mysql_error());   
} 
 
mysql_select_db("lat_dbase", $con); 
 
mysql_query("INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Karina', 'Suwandi', '29')"); 
 
mysql_query("INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('Glenn', 'Gandari', '32')"); 
 
mysql_close($con); 
?> 