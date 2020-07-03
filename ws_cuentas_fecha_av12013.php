<?php
//Materia por fecha de modificado.
//http://localhost/AV12013/ws_cuentas_fecha_av12013.php/?day=02&month=02&year=2020
$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
$day=$_REQUEST['day'];
//Para la conexion a bd.
$servidor="localhost";
$usuario="root";
$baseDatos="PARCIAL3B";
$password="usbw";
//para evitar warnings.
error_reporting(E_ALL ^ E_DEPRECATED);
//conexion.
$conexion=mysql_connect($servidor,$usuario,$password) or
die ("Problemas en la conexion");
mysql_select_db($baseDatos,$conexion)
or die("Problemas en la seleccion de la base de datos");
//Modificar tabla que se va a utilizar.
//query.
$registros=mysql_query("Select * from TIPOARTI where fecha_modificado>'".$year."-".$month."-".$day."'",$conexion) or
die("Problemas en el select:".mysql_error());
$filas=array();
while ($reg=mysql_fetch_assoc($registros))
{
$filas[]=$reg;
}
echo json_encode($filas);
mysql_close($conexion);
?>