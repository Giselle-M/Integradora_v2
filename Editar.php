<?php 
 echo "<a href='Registro.php'>Registro</a>";
echo "<a href='Consulta.php'>Consulta</a>"; 
//llamar archivo conexion.php
include("Conexion.php");
$id=@$_GET['ideditar'];
$sql="SELECT * FROM usuarios WHERE id_usuario='$id'";
$result = mysqli_query($cone,$sql);
$row=mysqli_fetch_assoc($result);
$NOMBRE=$row['Nombre'];
$APELLIDO=$row['Apellido'];
$CORREO=$row['Correo'];
$CONTRASEÑA=$row['Contraseña'];
$CONTACTO=$row['Contacto'];
$ASESORIAS=$row['Asesorias'];
if(isset($_POST['update'])){

$NOMBRENUEVO=$_POST['nombreformnuevo'];
$APELLIDONUEVO=$_POST['apellidoformnuevo'];
$CORREONUEVO=$_POST['emailformnuevo'];
$CONTRASEÑANUEVO=$_POST['passformnuevo'];
$CONTACTONUEVO=$_POST['contactoformnuevo'];
$ASESORIASNUEVO=$_POST['asesoriasformnuevo'];
$sql = "UPDATE usuarios SET Nombre='$NOMBRENUEVO',Apellido='$APELLIDONUEVO', Correo='$CORREONUEVO', Contraseña='$CONTRASEÑANUEVO', Contacto='$CONTACTONUEVO', Asesorias='$ASESORIASNUEVO' WHERE id_usuario='$id'"; 
//comillasmen id
$result = mysqli_query($cone,$sql);
if($result){
mysqli_close($cone);
//echo "Registro actualizado exitosamente"; 
header('location:Consulta.php');
}else{ echo "Error en la conexion";
}
}else{ //echo "Error en la actualizacion";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de actualización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #c5a2ce;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.568);
        }

        fieldset {
            border: transparent;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            font:bold;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #666;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #414141;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 93%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            background-color: #f2e6f5;
        }

        input[type="submit"] {
            width: 49%;
            padding: 15px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            background-color: #57297ec2;
            cursor :pointer;
        }
        input[type="reset"] {
            width: 48%;
            padding: 15px;
            margin-top: 15px;
            border: 1px solid #57297ec2;
            border-radius: 5px;
            font-size: 16px;
            color: #57297ec2;
            background-color: transparent;
            cursor :pointer;
        }

        button {
            background-color: #5f3964;
            color: #8a5cb4;
            border: 2px solid #7226af5e;
            padding: 10px 20px;
            border-radius: 1px;
            font-size: 16px;
            cursor: pointer;
        }

        textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
            width: 93%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            background-color: #f2e6f5;
        }
    </style>
    <script>
        function clearText(element) {
            if (element.value === "Máximo 200 caracteres") {
                element.value = "";
            }
        }
    </script>
    </head>
    <body style="background-color: rgb(244, 223, 252);">
        <h1 style="color:#5f3964">FORMULARIO DE ACTUALIZACIÓN</h1>
        <br>
        <br>
        <form method="post">
            <fieldset>
                <legend><strong style="color: #5f3964;">DATOS PERSONALES</strong></legend>
            
                <label>Nombre: <input type="text" name="nombreformnuevo" maxlength="100" value="<?php echo $NOMBRE;?>"></label>
                <br>
                <label>Apellido: </label><input type="text" name="apellidoformnuevo" value="<?php echo $APELLIDO;?>">
                <br>
                <label>Correo: </label><input type="email" name="emailformnuevo" value="<?php echo $CORREO;?>">
                <br> 
                <br>
                <label>Contraseña: </label><input type="password" name="passformnuevo" value="<?php echo $CONTRASEÑA;?>">
                <br>
                <br>
                <label>Contacto: </label><input type="text" name="contactoformnuevo" value="<?php echo $CONTACTO;?>">
                <br>
                <label>Asesorías: </label><input type="text" name="asesoriasformnuevo" value="<?php echo $ASESORIAS;?>">
                <br>
            </fieldset>
<input type="submit" name="update" value="Actualizar" onclick="mensaje()"> <input type="reset" value="Reset">
</p>
<script type='text/javascript'>function mensaje() {alert('Registro actualizado exitosamente');} </script>
</form>
</div>
</body>
</html>