<?php include("../../db.php");
if($_POST){
  $UbicacionID=(isset($_POST["UbicacionID"])?$_POST["UbicacionID"]:"");
  $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
  $Ubicacion=(isset($_POST["Ubicacion"])?$_POST["Ubicacion"]:"");

  $sentence=$con->prepare("INSERT INTO ubicacion(UbicacionID,Nombre,Ubicacion) 
                            VALUES (:UbicacionID,:Nombre,:Ubicacion)");
  $sentence->bindParam(":UbicacionID",$UbicacionID);
  $sentence->bindParam(":Nombre",$Nombre);
  $sentence->bindParam(":Ubicacion",$Ubicacion);
  $sentence->execute();
  header("Location:index.php");
}
?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
    Ubicacion
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="UbicacionID" class="form-label">ID</label>
              <input type="text"
                class="form-control" name="UbicacionID" id="UbicacionID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Ubicacion" class="form-label">Ubicacion</label>
              <input type="text"
                class="form-control" name="Ubicacion" id="Ubicacion" aria-describedby="helpId" placeholder="Ubicacion">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>