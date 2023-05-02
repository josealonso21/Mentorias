<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM cursodominadopormentor WHERE DominadoID=:DominadoID");
    $sentence->bindValue(':DominadoID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $DominadoID=$registro["DominadoID"];
    $Nombre=$registro["Nombre"];
    $Calificacion=$registro["Calificacion"];
    $Reconocimiento=$registro["Reconocimiento"];
}
if($_POST){
    $DominadoID=(isset($_POST["DominadoID"])?$_POST["DominadoID"]:"");
    $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
    $Calificacion=(isset($_POST["Calificacion"])?$_POST["Calificacion"]:"");
    $Reconocimiento=(isset($_POST["Reconocimiento"])?$_POST["Reconocimiento"]:"");
  
    $sentence=$con->prepare("UPDATE cursodominadopormentor SET DominadoID=:DominadoID,Nombre=:Nombre,Calificacion=:Calificacion,Reconocimiento=:Reconocimiento WHERE DominadoID=:DominadoID");
    $sentence->bindParam(":DominadoID",$txtID);
    $sentence->bindParam(":Nombre",$Nalumno);
    $sentence->bindParam(":Calificacion",$CoAlumno);
    $sentence->bindParam(":Reconocimiento",$Calumno);
    $sentence->execute();
    header("Location:index.php");
  }

?>
<?php include("../../templates/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">
        Curso Dominado por Mentor
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="DominadoID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="DominadoID" id="DominadoID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" value="<?php echo $Nombre;?>"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Calificacion" class="form-label">Calificacion</label>
              <input type="text" value="<?php echo $Calificacion;?>"
                class="form-control" name="Calificacion" id="Calificacion" aria-describedby="helpId" placeholder="Calificacion">
            </div>
            <div class="mb-3">
              <label for="Reconocimiento" class="form-label">Reconocimiento</label>
              <input type="text" value="<?php echo $Reconocimiento;?>"
                class="form-control" name="Reconocimiento" id="Reconocimiento" aria-describedby="helpId" placeholder="Reconocimiento">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>