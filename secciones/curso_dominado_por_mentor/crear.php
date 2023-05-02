<?php include("../../db.php");
if($_POST){
  $DominadoID=(isset($_POST["DominadoID"])?$_POST["DominadoID"]:"");
  $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
  $Calificacion=(isset($_POST["Calificacion"])?$_POST["Calificacion"]:"");
  $Reconocimiento=(isset($_POST["Reconocimiento"])?$_POST["Reconocimiento"]:"");

  $sentence=$con->prepare("INSERT INTO cursodominadopormentor(DominadoID,Nombre,Calificacion,Reconocimiento) 
                            VALUES (:DominadoID,:Nombre,:Calificacion,:Reconocimiento)");
  $sentence->bindParam(":DominadoID",$DominadoID);
  $sentence->bindParam(":Nombre",$Nombre);
  $sentence->bindParam(":Calificacion",$Calificacion);
  $sentence->bindParam(":Reconocimiento",$Reconocimiento);
  $sentence->execute();
  header("Location:index.php");
}
?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Curso que domina el mentor
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="DominadoID" class="form-label">ID</label>
              <input type="text"
                class="form-control" name="DominadoID" id="DominadoID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Calificacion" class="form-label">Calificacion</label>
              <input type="text"
                class="form-control" name="Calificacion" id="Calificacion" aria-describedby="helpId" placeholder="Calificacion">
            </div>
            <div class="mb-3">
              <label for="Reconocimiento" class="form-label">Reconocimiento</label>
              <input type="text"
                class="form-control" name="Reconocimiento" id="Reconocimiento" aria-describedby="helpId" placeholder="Reconocimiento">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
    
</div>

<?php include("../../templates/footer.php"); ?>