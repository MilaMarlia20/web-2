<?php 
mysql_pconnect("localhost","root",""); 
//koneksi 
mysql_select_db("lat_dbase"); 
// mengaktifkan database 
//membuat tabel 
$sql = "CREATE TABLE tbl_mhs     
( mhsID int NOT NULL AUTO_INCREMENT, PRIMARY KEY(mhsID), 
FirstName varchar(15), 
LastName varchar(15), 
Age int )"; 
mysql_query($sql); 
// input data 
$input=mysql_query("INSERT INTO tbl_mhs(FirstName,LastName,Age) values ('Anjar','Prabowo','25')"); 
?>