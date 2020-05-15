<?php 
// hostname or ip of server 
$servername='localhost'; 
 
// username and password  
$dbusername='root'; 
$dbpassword=''; 
$link=mysql_pconnect ("$servername","$dbusername","$dbpassword") or die ( " Not able to connect to server "); 
if ($link) {  
    echo "ok....koneksi berhasil"; 
    } 
?> 