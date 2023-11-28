<?php
    include("Conexion.php");
    $nombre=$_POST['nombreform'];
    $apellido=$_POST['apellidoform'];
    $correo=$_POST['emailform'];
    $contraseña=$_POST['passform'];
    $sql="Insert into usuarios(Nombre, Apellido, Correo, Contraseña)
            values('$nombre', '$apellido','$correo','$contraseña')";
    $resultado=mysqli_query($cone,$sql);
    if($resultado)
    {
        echo "Registro exitoso";
    }
    else
    {
        echo "Fallido";
    }
    mysqli_close($cone);
?>