<?php include("../../db.php");
if($_POST){
  $ID=(isset($_POST["ID"])?$_POST["ID"]:"");
  $VideoDePresentacion=(isset($_POST["VideoDePresentacion"])?$_POST["VideoDePresentacion"]:"");
  $NotasDeCurso=(isset($_POST["NotasDeCurso"])?$_POST["NotasDeCurso"]:"");
  $HorasDisponible=(isset($_POST["HorasDisponible"])?$_POST["HorasDisponible"]:"");
  $CalificacionServicio=(isset($_POST["CalificacionServicio"])?$_POST["CalificacionServicio"]:"");

  $sentence=$con->prepare("INSERT INTO informaciondementor(ID,VideoDePresentacion,NotasDeCurso,HorasDisponible,CalificacionServicio) 
                            VALUES (:ID,:VideoDePresentacion,:NotasDeCurso,:HorasDisponible,:CalificacionServicio)");
  $sentence->bindParam(":ID",$ID);
  $sentence->bindParam(":VideoDePresentacion",$VideoDePresentacion);
  $sentence->bindParam(":NotasDeCurso",$NotasDeCurso);
  $sentence->bindParam(":HorasDisponible",$HorasDisponible);
  $sentence->bindParam(":CalificacionServicio",$CalificacionServicio);
  $sentence->execute();
  header("Location:index.php");
}
?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
    Informacion del mentor
    </div>
    <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
              <label for="ID" class="form-label">ID</label>
              <input type="text"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="VideoDePresentacion" class="form-label">Video de Presentacion</label>
              <input type="text"
                class="form-control" name="VideoDePresentacion" id="VideoDePresentacion" aria-describedby="helpId" placeholder="Video de Presentacion">
            </div>
            <div class="mb-3">
              <label for="NotasDeCurso" class="form-label">Notas del Curso que dictara</label>
              <input type="text"
                class="form-control" name="NotasDeCurso" id="NotasDeCurso" aria-describedby="helpId" placeholder="Notas del Curso que dictara">
            </div>
            <div class="mb-3">
              <label for="HorasDisponible" class="form-label">Horario disponible</label>
              <input type="text"
                class="form-control" name="HorasDisponible" id="HorasDisponible" aria-describedby="helpId" placeholder="Horario disponible">
            </div>
            <div class="mb-3">
              <label for="CalificacionServicio" class="form-label">Calificacion de Servicio</label>
              <input type="text"
                class="form-control" name="CalificacionServicio" id="CalificacionServicio" aria-describedby="helpId" placeholder="Calificacion de Servicio">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>