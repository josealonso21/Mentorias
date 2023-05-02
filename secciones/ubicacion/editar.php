<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM ubicacion WHERE UbicacionID=:UbicacionID");
    $sentence->bindValue(':UbicacionID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $Nombre=$registro["Nombre"];
    $Ubicacion=$registro["Ubicacion"];
}
if($_POST){
    $UbicacionID=(isset($_POST["UbicacionID"])?$_POST["UbicacionID"]:"");
    $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
    $Ubicacion=(isset($_POST["Ubicacion"])?$_POST["Ubicacion"]:"");
  
    $sentence=$con->prepare("UPDATE ubicacion SET UbicacionID=:UbicacionID,Nombre=:Nombre,Ubicacion=Ubicacion WHERE UbicacionID=:UbicacionID");
    $sentence->bindParam(":UbicacionID",$txtID);
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
        Datos de Ubicacion
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="UbicacionID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="UbicacionID" id="UbicacionID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" value="<?php echo $Nombre;?>"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Ubicacion" class="form-label">Ubicacion</label>
              <input type="text" value="<?php echo $Ubicacion;?>"
                class="form-control" name="Ubicacion" id="Ubicacion" aria-describedby="helpId" placeholder="Ubicacion">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>