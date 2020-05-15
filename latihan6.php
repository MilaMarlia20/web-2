<?php  
mysql_connect("localhost","root","");  
mysql_select_db("lat_dbase");  
$hasil=mysql_query("select * from tbl_mhs");  
While($data=mysql_fetch_array($hasil))  
{   
    echo "$data[FirstName] $data[LastName] $data[Age]<br>";  
} 
?> 