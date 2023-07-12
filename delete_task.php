<?php
include("db.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "UPDATE formulario set estado = 2 WHERE id =$id";
  mysqli_query($conn, $query);
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['eliminar'] = 'Eliminado Exitosamente';
  header('Location: index.php');
}


//$query = "DELETE FROM formulario WHERE id = $id";
//"UPDATE formulario set

/*
 if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $dni = $_POST['txtDni'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $edad = $_POST['txtEdad'];
    $fecha_nac = $_POST['txtFecha_nac'];


    $query = "UPDATE formulario set dni = '$dni', nombre = '$nombre', apellido= '$apellido',edad = '$edad',fecha_nac = '$fecha_nac' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');

 */