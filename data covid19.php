
<?php
$wilayah = $_POST ['nama_wilayah'];
$positif = $_POST['jumlah_positif'];
$dirawat = $_POST['jumlah_dirawat'];
$sembuh = $_POST['jumlah_sembuh'];
$meninggal = $_POST['jumlah_meninggal'];
$operator = $_POST ['namaoperator'];
$nim = $_POST ['nim'];
$nf = "komentar.txt";
$fp = fopen($nf,"r+");
$data = fgets ($fp,50);
$comfile = file($nf);
rewind($fp);
fwrite($fp,


"<table width=500 align=center bgcolor=#CCCCCC>

<tr>

<td width=300> Jumlah Positif  </td>

<td width=300> Jumlah dirawat  </td>

<td width=300>  Jumlah Sembuh  </td>

<td width=300> Jumlah Meninggal </td>

</tr>

<tr>

<td> $positif </td>

<td> $dirawat </td>

<td> $sembuh </td>

<td> $meninggal </td>

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
