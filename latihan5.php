<?php  
mysql_connect("localhost","root","");  
mysql_select_db("lat_dbase");  
$hasil=mysql_db_query("lat_dbase","select * from tbl_mhs");  
While($data=mysql_fetch_row($hasil))  
{    
    echo "$data[0] $data[1] $data[2]<br>";  
} 
?> 