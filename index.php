<html>

<head>

<title>komentar</title>

</head>

<body>

<form action="bukutamu.php" method="post" enctype="multipart/form-data" name="form1">

<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">

<tr>

<td width="9%">Nama</td>

<td width="91%"><input name="nama" type="text" id="nama" size="20"></td>

</tr>

<tr>

<td>Email</td>

<td><input type="text" name="email" size="20"></td>

</tr>

<tr>

<td>Komentar</td>

<td><textarea name="komentar" cols="50" rows="5" id="komentar"></textarea></td>

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

komentar<?php

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