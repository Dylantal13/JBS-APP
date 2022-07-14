<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Usuarios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="card">
  <div class="card-body">
  <h5 class="card-title">Usuarios</h5>
  </div>
</div>

<div class="container mt-5">
  <div class="mt-3">
     <table class="table table-bordered" id="datatable_comisiones">
       <thead>
          <tr>
             <th>Id</th>
             <th>Usuario</th>
             <th>e-mail</th>
             <th>Acciones</th>
          </tr>
       </thead>
       <tbody>
         <!--    <div class="ibox-content">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3 ">
                            <label class="font-normal" for="nombreFiltro">Nombre</label>
                            <input type="text" class="form-control" id="nombreFiltro">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                            <label class="font-normal" for="descripcionFiltro">Descripción</label>
                            <input type="text" class="form-control" id="descripcionFiltro" name="descripcionFiltro">
                            </select>
                        </div>
                    </div>
                </div> -->
          <?php if($usuarios): ?>
          <?php foreach($usuarios as $usuario): ?>
          <tr>
             <td><?php echo $usuario['id']; ?></td>
             <td><?php echo $usuario['username']; ?></td>
             <td><?php echo $usuario['email']; ?></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>  
  </div>
  
  <button style="margin-top:100px;" type="button" id="add_usuario" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary float-right mt-50">Agregar usuario</button>
</div>



<!-- modal Add -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">e-mail:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

      




 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#datatable_usuarios').DataTable();
  } );
</script>
</body>
</html>