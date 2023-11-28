<?php
session_start();
include("Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegurarse de que no hay espacios en blanco adicionales y escapar datos
    $correo = mysqli_real_escape_string($cone, trim($_POST['emailform']));
    $contraseña = mysqli_real_escape_string($cone, trim($_POST['passform']));

    // Verificar datos para depuración
    echo "Correo: $correo<br>";
    echo "Contraseña: $contraseña<br>";

    $sql = "SELECT * FROM usuarios WHERE Correo='$correo' AND Contraseña='$contraseña'";
    $result = mysqli_query($cone, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Inicio de sesión exitoso
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Correo'] = $correo;
            $_SESSION['Nombre'] = $row['Nombre'];
            echo "Inicio de sesión exitoso"; // Mensaje de depuración
            var_dump($row); // Verificar datos obtenidos
            header("location: pg-principal.html");
            exit;
        } else {
            echo "Correo o contraseña incorrectos";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($cone);
    }

    mysqli_free_result($result);
}

mysqli_close($cone);
?>