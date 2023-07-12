<?php

include("db.php");



if (!empty($_POST['save_task'])) {
    if (!empty($_POST['txtDni']) and !empty($_POST['txtNombre'] and !empty($_POST['txtApellido']) and !empty($_POST['txtEdad']) and !empty($_POST['txtFecha_nac']))) {

        $dni = $_POST['txtDni'];
        $nombre = strtoupper($_POST['txtNombre']);
        $apellido = strtoupper($_POST['txtApellido']);
        $edad = $_POST['txtEdad'];
        $fecha_nac = $_POST['txtFecha_nac'];
        
        
        $query = "INSERT  INTO formulario  (dni,nombre,apellido,edad,fecha_nac,estado) VALUES('$dni','$nombre','$apellido','$edad','$fecha_nac',1)";
        $resul = mysqli_query($conn, $query);


        $_SESSION['message'] = 'Se guardo de manera correcta ';
       
    } else {
        $_SESSION['message2'] = 'Algunos de los campos esta vacio';
    }
}

header("Location: index.php");
