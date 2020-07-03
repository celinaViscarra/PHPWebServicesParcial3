<?php
include("db.php");
if(isset($_REQUEST['year']) && isset($_REQUEST['month']) && isset($_REQUEST['day'])){
  $year=$_REQUEST['year'];
  $month=$_REQUEST['month'];
  $day=$_REQUEST['day'];

  $query = sprintf(
    "SELECT * FROM tipoarti WHERE fecha_modificado > '%s-%s-%s'",
    mysql_real_escape_string($year),
    mysql_real_escape_string($month),
    mysql_real_escape_string($day)
  );

  $registros=mysql_query($query,$conexion);
  if(!$registros){
    $respuesta['error']=mysql_error();
  }else{
    $respuesta=array();
    while ($reg=mysql_fetch_assoc($registros)){
      $respuesta[]=$reg;
    }
  }
}else{
  $respuesta['error'] = "No ha ingresado alguno de los campos necesarios.";
}
echo json_encode($respuesta);
mysql_close($conexion);
