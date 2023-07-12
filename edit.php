<?php
include("db.php");
$hola;


$dni = '';
$nombre = '';
$apellido = '';
$edad = '';
$fecha_nac = '';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM formulario WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $dni =  $row['dni'];
        $nombre =  $row['nombre'];
        $apellido =  $row['apellido'];
        $edad = $row['edad'];
        $fecha_nac =  $row['fecha_nac'];
    }
}

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
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">Editar Registro</label>
                    </div>
                    <div>
                        <label for="formGroupExampleInput" class="form-label"> DNI</label>
                        <input name="txtDni" type="text" class="form-control" value="<?php echo $dni; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">NOMBRE</label>
                        <input name="txtNombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">APELLIDO</label>
                        <input name="txtApellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">EDAD</label>
                        <input name="txtEdad" type="text" class="form-control" value="<?php echo $edad; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">Fecha Nac</label>
                        <input type="date"  name="txtFecha_nac" class="form-control" value="<?php echo $fecha_nac; ?>">
                    </div>
                    <div class=" d-grid gap-2">
                        <button class="btn btn-success btn-block" name="update">
                            Guardar
                        </button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>