<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas desde la Base de Datos</title>
</head>
<body>
    <h1>Consultas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Contacto</th>
            <th>Asesorías</th>
        </tr>
        <?php
        include("Conexion.php");
        $acceso_db= mysqli_select_db($cone,$bd);
        if($bd){
            //echo "Acceso a la base de datos realizado exitosamente";
        }
        else{
            echo "Error en el acceso a la base de datos";
        }
        //Consulta
        $sql="Select * from usuarios";
        $result=mysqli_query($cone,$sql); 
        while($row=mysqli_fetch_array($result)){ echo "<tr>";
            echo "<td>".$row['id_usuario']."</td>"; 
            echo "<td>".$row['Nombre']."</td>"; 
            echo "<td>".$row['Apellido']."</td>";
            echo "<td>".$row['Correo']."</td>";
            echo "<td>".$row['Contraseña']."</td>";
            echo "<td>".$row['Contacto']."</td>";
            echo "<td>".$row['Asesorias']."</td>";
            echo "<td> <a href='Editar.php?ideditar=".$row['Id']."'>Editar</a>"."-";	
            echo "<a onClick=\"javascript: return confirm('Please confirm deletion');\" 
            href='Eliminar.php?ideliminar=".$row['id_usuario']."'>Eliminar</a> </td>";
        "</tr>";}
        $cone->close();
        ?>
    </table>
</body>
</html>