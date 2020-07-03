<?php
//Actualizar
 $idarticulo=$_REQUEST['idarticulo'];
$nomarti=$_REQUEST['nomarti'];
$servidor="localhost";
$usuario="root";
$baseDatos="PARCIAL3B";
$password="usbw";
error_reporting(E_ALL ^ E_DEPRECATED);
$respuesta=array('resultado'=>0);
json_encode($respuesta);
$conexion=mysql_connect($servidor,$usuario,$password) or
die ("Problemas en la conexion");
mysql_select_db($baseDatos,$conexion)
or die("Problemas en la seleccion de la base de datos");
//VERIFICAR DATOS.
$query = "UPDATE articulo SET nomarti='".$nomarti."' WHERE idarticulo='".$idarticulo."'";
//echo($query);
$resultado = mysql_query($query) or die(mysql_error());
//Si la respuesta es correcta enviamos 1 y sino enviamos 0
if(mysql_affected_rows() == 1)
$respuesta=array('resultado'=>1);
echo json_encode($respuesta);
mysql_close($conexion);
?>