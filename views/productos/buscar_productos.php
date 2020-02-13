<?php
include 'conf.php';
?>



<form action="<?=base_url?>producto/buscar/" method="get">
<input type="text" name="palabra" value="<?  echo ($_GET["palabra"]);  ?>"  />
<input type="submit" name="buscador" value="Buscar"  />
</form>

<? 
$host = "localhost"; 	//TU HOST//
$dbuser = "root";	 	//TU USUARIO DEL HOST//
$dbpwd = "";	//TU CONTRASE�A//
$db = "centro_agricola";		//TU BASE DE DATOS//

$connect = mysql_connect ($host, $dbuser, $dbpwd);
if(!$connect)
echo ("No se pudo conectar a la base de datos");
else
$select = mysql_select_db($db);

if ($_GET['buscador'])
{

$buscar = $_GET['palabra'];

if (empty($buscar))
{
echo "No se ha ingresado ninguna palabra";
}
else
{

$sql = "SELECT * FROM productos WHERE nombre LIKE '%$buscar%'";
$result = mysqli_query($sql,$connect);

$total = mysqli_num_rows($result);

if ($row = mysqli_fetch_array($result)) {

echo "Resultados para: $buscar";
echo "Total de resultados: $total";

do {
?>
<br>
<br>
(Id: <? echo $row['id']; ?>) - <? echo $row['nombre']; ?>

<?
}
while ($row = mysql_fetch_array($result));
}
else
{
echo "No se encontraron resultados para: $buscar";
}
}
}
?>