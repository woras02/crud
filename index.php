<?php include("db.php") ?>


<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">

    <div class="col-md-4">


      <?php
      if (isset($_SESSION['message'])) {
        $respuesta = $_SESSION['message'];
      ?>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Se guardo correctamente',
            showConfirmButton: false,
            timer: 2000
          })
        </script>

      <?php
        unset($_SESSION['message']);
      }
      ?>

      <?php
      if (isset($_SESSION['eliminar'])) {
        $respuesta = $_SESSION['eliminar'];
      ?>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Se eliminado correctamente',
            showConfirmButton: false,
            timer: 2000
          })

          /*
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
          });

          swalWithBootstrapButtons
            .fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel!",
              reverseButtons: true,
            })
            .then((result) => {
              if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Your file has been deleted.",
                  "success"
                );
              } else if (
                
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  "Cancelled",
                  "Your imaginary file is safe :)",
                  "error"
                );
              }
            });
           */
        </script>

      <?php
        unset($_SESSION['eliminar']);
      }
      ?>




      <?php
      if (isset($_SESSION['message2'])) {
        $respuesta = $_SESSION['message2'];
      ?>
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Algunos campos falta completar',
            text: 'Something went wrong!',
          });
        </script>

      <?php
        unset($_SESSION['message2']);
      }
      ?>


      <div class="card card-body">
        <form action="save_task.php" method="POST">



          <div class="form-group text-center">
            <label for="formGroupExampleInput" class="form-label">Registrar Datos</label>
          </div>
          <br>
          <div class="form-group">
            <label for="formGroupExampleInput" class="form-label">DNI</label>
            <input type="Number" name="txtDni" class="form-control" placeholder="INGRESAR DNI" autofocus>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput" class="form-label">Nombre</label>
            <input type="text" name="txtNombre" class="form-control" placeholder="INGRESAR NOMBRE">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput" class="form-label">Apellido</label>
            <input type="text" name="txtApellido" class="form-control" placeholder="INGRESAR APELLIDO">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput" class="form-label">Edad</label>
            <input type="Number" name="txtEdad" class="form-control" placeholder="INGRESAR EDAD">
          </div>
          <br>
          <div class="form-group">
            <label for="formGroupExampleInput" class="form-label">Fecha Nac</label>
            <input type="date" name="txtFecha_nac" class="form-control">
            <!--  <input type="text" name="txtFecha_nac" class="form-control" placeholder="INGRESAR" autofocus>-->
          </div>
          <br>

          <div class=" d-grid gap-2">

            <button type=" submit" class="btn btn-success btn-block " name="save_task" value="Save task">Guardar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-8">

      <table class="table table-dark table-hover">
        <thead>
          <tr class="text-center">
            <th scope="col">DNI</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">EDAD</th>
            <th scope="col">FECHA NAC</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>


          <?php

          $query = "SELECT *  FROM formulario WHERE estado =1";
          $result_tarea = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_array($result_tarea)) {
            //echo strtoupper($row);
          ?>
            <tr class="text-center">

              <td><?php echo  $row['dni']; ?></td>
              <td><?php echo  $row['nombre']; ?></td>
              <td><?php echo  $row['apellido']; ?></td>
              <td><?php echo  $row['edad']; ?></td>
              <td><?php echo  $row['fecha_nac']; ?></td>

              <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#nuevoModal" data-bs-id="<?= $row['id']; ?>">
                  <i class="fa-solid fa-pen-to-square fa-beat"> </i>
                </a>


                <a href="delete_task.php?id=<?php echo $row['id']; ?>">
                  <i class="fa-solid fa-trash fa-beat " style="color: #ff0000;"></i>
                </a>


              </td>
            </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="eliminar.js"></script>



<script>
  let nuevoModal = document.getElementById('nuevoModal')

  nuevoModal.addEventListener('shown.bs.modal', event => {
    nuevoModal.querySelector('.modal-body #nombre').focus()
  })

  nuevoModal.addEventListener('hide.bs.modal', event => {
    nuevoModal.querySelector('.modal-body #nombre').value = ""
    nuevoModal.querySelector('.modal-body #descripcion').value = ""
    nuevoModal.querySelector('.modal-body #genero').value = ""
    nuevoModal.querySelector('.modal-body #poster').value = ""
  })

  editaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputId = editaModal.querySelector('.modal-body #id')
    let inputNombre = editaModal.querySelector('.modal-body #nombre')
    let inputApellido = editaModal.querySelector('.modal-body #apellido')
    let inputGenero = editaModal.querySelector('.modal-body #genero')
    let poster = editaModal.querySelector('.modal-body #img_poster')

    let url = "modal.php"
    let formData = new FormData()
    formData.append('id', id)

    fetch(url, {
        method: "POST",
        body: formData
      }).then(response => response.json())
      .then(data => {

        inputId.value = data.id
        inputNombre.value = data.nombre
        inputDescripcion.value = data.descripcion
        inputGenero.value = data.id_genero
        poster.src = '<?= $dir ?>' + data.id + '.jpg'

      }).catch(err => console.log(err))

  })

  eliminaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    eliminaModal.querySelector('.modal-footer #id').value = id
  })
</script>



<?php include("modal.php") ?>
<?php include("includes/footer.php") ?>