<?php 
mysql_pconnect("localhost","root",""); 
mysql_select_db("lat_dbase"); 
$hasil=mysql_query("select * from tbl_mhs"); 
$hit=mysql_num_rows($hasil); 
echo "jumlah record $hit"; 
?>