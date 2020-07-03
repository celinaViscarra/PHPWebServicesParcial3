<?php
include("db.php");
if(isset($_REQUEST['idarticulo']) && isset($_REQUEST['nomarti'])){
  $idarticulo=$_REQUEST['idarticulo'];
  $nomarti=$_REQUEST['nomarti'];
  //Formacion del query
  $query = sprintf(
    "UPDATE articulo SET nomarti = '%s' WHERE idarticulo = '%s'",
    mysql_real_escape_string($nomarti),
    mysql_real_escape_string($idarticulo)
  );
  $respuesta['query'] = $query;
  $resultado = mysql_query($query);
  //Primero, verificamos que no haya dado error
  if(!$resultado){
    $respuesta['error']=mysql_error();
  }
  //Despues, verificamos tambien que el numero de filas se haya actualizado.
  else if(mysql_affected_rows() == 1){
    //Si la respuesta es correcta enviamos 1 y sino enviamos 0
    $respuesta=array('resultado'=>1);
  }
  mysql_close($conexion);
}
else{
  $respuesta['error'] = "No ha ingresado alguno de los campos necesarios.";
}
echo json_encode($respuesta);

