<?php 
$file = fopen("text1.txt","r"); 
echo fgets($file); 
fclose($file); 
?>