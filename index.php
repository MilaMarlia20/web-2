<html>

<head>

<title>Data Pasien Covid_19</title>

</head>

<body>

<form action="data covid19.php" method="post" enctype="multipart/form-data" name="form1">

<table width="500" border="0" align="center"  align = "right" cellpadding="0" cellspacing="1">

<p>
<td>Nama Wilayah :</td>
<td>
            <select name="nama_wilayah"placeholder="Dropdown" >
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value ="Banten">Banten</option>
                <option  value = "Jawa Tengah">Jawa Tengah</option>
            </select>
</td>
</p>


<tr>
 <p>
<td>Jumlah Positif :</td>

<td><input type="text" name="jumlah_positif" size="20"></td>
</p>
</tr>
<tr>
<p>
<td>Jumlah dirawat :</td>
<td><input type="text" name="jumlah_dirawat"  size="20"></td>
</p>
</tr>

<tr>

<td>Jumlah Sembuh :</td>

<td><input type="text" name="jumlah_sembuh" size="20"></td>

</tr>
<tr>

<td>Jumlah Meninggal :</td>

<td><input type="text" name="jumlah_meninggal" size="20"></td>

</tr>
<tr>
<td>Nama Operator :</td>
<td><input type="text" name="namaoperator" size="20"></td>
</tr>
<tr>

<td>Nim Mahasiswa :</td>

<td><input type="text" name="nim" size="20"></td>

</tr>


<tr>

<td>&nbsp;</td>

<td><input type="submit" value="Submit" name="submit">

<input type="reset" value="reset" name="reset"></td>

</tr>

</table>

</form>

<p align="center"><br>

<br>

<?php

$file = "jumlah.txt";

$fp = fopen($file,"r");

if ($fp)

{

$baca = fgets($fp,50);

print ("$baca");

}

fclose($fp);

?>

<h3 style="text-align: center">Data Pemantauan Covid -19 Wilayah Jawa Tengah <br>
per <?= date('d-m-Y H:i:s'); ?> <br>
Mila Marlia / 2016142237 
        </h3>
        <?php
$file = "komentar.txt";

$fp = fopen($file,"r");

while (!feof($fp))

{

$baca = fgets($fp,50);

print("$baca");

}

fclose($fp);

?>

</p>

<p>&nbsp;</p>

</body>

</html>