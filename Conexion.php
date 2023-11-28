<?php 
    $usuario="root";
    $passw="karen123";
    $bd="studiantory";
    $host="127.0.0.1";
    $cone=mysqli_connect ($host,$usuario,$passw,$bd);
    if($cone)
    {echo "conexion exitosa";
    }
    else {echo "conexion fallida";}
?>