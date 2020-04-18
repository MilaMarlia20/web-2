<?php

$nama = $_POST['nama'];

$komentar = $_POST['komentar'];

$email=$_POST['email'];

$waktu = date("d-m-y | H:i:s");

$nf = "komentar.txt";

$fp = fopen($nf,"r+");

$data = fgets ($fp,50);

$comfile = file($nf);

rewind($fp);

fwrite($fp,



"<table width=500 align=center bgcolor=#CCCCCC>

<tr bgcolor=#006600>

<td width=250><font color =white> nama </font> <font color =red> $nama </font> <font color =white> email <font> <font color =red>$email </font></td>

<td ><font color =white>tanggal </font> <font color =red> $waktu</font></td>

</tr>

<tr>

<td colspan = 2 >berkata :$komentar</td>

</tr>

</table>

<br>

");
for ($i = 0; $i < 999; $i++)

{

fwrite ($fp, $comfile[$i]);

}

fclose ($fp);

if ($_POST['submit']) {

header ("location: index.php");

}

?>

<?php

$file = "jumlah.txt";

$open = fopen($file,"r+");

$counter=fread($open,filesize($file));

fclose($open);

$counter++;

$write=fopen($file,'w');

fputs($write,$counter);

fclose($write);

?>