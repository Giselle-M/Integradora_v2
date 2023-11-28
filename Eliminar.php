<?php	 
$id=$_GET['ideliminar']; include("Conexion.php");
$sql="DELETE FROM usuarios WHERE id_usuario ='".$id."'";
$result = mysqli_query($cone,$sql); if($result) {
echo "Registro eliminado exitosamente";
header('location:Consulta.php');
}else{ echo "Error en la conexion";
}
mysqli_close($cone);
?>