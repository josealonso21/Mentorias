<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM informaciondementor WHERE ID=:ID");
    $sentence->bindValue(':ID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $VideoDePresentacion=$registro["VideoDePresentacion"];
    $NotasDeCurso=$registro["NotasDeCurso"];
    $HorasDisponible=$registro["HorasDisponible"];
    $CalificacionServicio=$registro["CalificacionServicio"];
}
if($_POST){
    $ID=(isset($_POST["ID"])?$_POST["ID"]:"");
    $VideoDePresentacion=(isset($_POST["VideoDePresentacion"])?$_POST["VideoDePresentacion"]:"");
    $NotasDeCurso=(isset($_POST["NotasDeCurso"])?$_POST["NotasDeCurso"]:"");
    $HorasDisponible=(isset($_POST["HorasDisponible"])?$_POST["HorasDisponible"]:"");
    $CalificacionServicio=(isset($_POST["CalificacionServicio"])?$_POST["CalificacionServicio"]:"");
  
    $sentence=$con->prepare("UPDATE informaciondementor SET ID=:ID,VideoDePresentacion=:VideoDePresentacion,NotasDeCurso=:NotasDeCurso,HorasDisponible=:HorasDisponible,CalificacionServicio=CalificacionServicio WHERE ID=:ID");
    $sentence->bindParam(":ID",$txtID);
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
        Informacion del Mentor
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="AlumnoID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="VideoDePresentacion" class="form-label">VideoDePresentacion</label>
              <input type="text" value="<?php echo $VideoDePresentacion;?>"
                class="form-control" name="VideoDePresentacion" id="VideoDePresentacion" aria-describedby="helpId" placeholder="Video de Presentacion">
            </div>
            <div class="mb-3">
              <label for="NotasDeCurso" class="form-label">Notas de Curso</label>
              <input type="text" value="<?php echo $NotasDeCurso;?>"
                class="form-control" name="NotasDeCurso" id="NotasDeCurso" aria-describedby="helpId" placeholder="Notas de Curso">
            </div>
            <div class="mb-3">
              <label for="HorasDisponible" class="form-label">Horas Disponible</label>
              <input type="text" value="<?php echo $HorasDisponible;?>"
                class="form-control" name="HorasDisponible" id="HorasDisponible" aria-describedby="helpId" placeholder="Horas Disponible">
            </div>
            <div class="mb-3">
              <label for="CalificacionServicio" class="form-label">Calificacion de Servicio</label>
              <input type="text" value="<?php echo $CalificacionServicio;?>"
                class="form-control" name="CalificacionServicio" id="CalificacionServicio" aria-describedby="helpId" placeholder="Calificacion de Servicio">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>