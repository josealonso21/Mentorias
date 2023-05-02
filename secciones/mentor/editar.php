<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM mentor WHERE MentorID=:MentorID");
    $sentence->bindValue(':MentorID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $Nombre=$registro["Nombre"];
    $Contrasena=$registro["Contrasena"];
    $Ubicacion=$registro["Ubicacion"];
    $Institucion=$registro["Institucion"];
    $CursoPorEnsenar=$registro["CursoPorEnsenar"];
}
if($_POST){
    $MentorID=(isset($_POST["MentorID"])?$_POST["MentorID"]:"");
    $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
    $Contrasena=(isset($_POST["Contrasena"])?$_POST["Contrasena"]:"");
    $Ubicacion=(isset($_POST["Ubicacion"])?$_POST["Ubicacion"]:"");
    $Institucion=(isset($_POST["Institucion"])?$_POST["Institucion"]:"");
    $CursoPorEnsenar=(isset($_POST["CursoPorEnsenar"])?$_POST["CursoPorEnsenar"]:"");
  
    $sentence=$con->prepare("UPDATE mentor SET MentorID=:MentorID,Nombre=:Nombre,Contrasena=:Contrasena,Ubicacion=Ubicacion,Institucion=:Institucion,CursoPorEnsenar=:CursoPorEnsenar WHERE MentorID=:MentorID");
    $sentence->bindParam(":MentorID",$txtID);
    $sentence->bindParam(":Nombre",$Nombre);
    $sentence->bindParam(":Contrasena",$Contrasena);
    $sentence->bindParam(":Ubicacion",$Ubicacion);
    $sentence->bindParam(":Institucion",$Institucion);
    $sentence->bindParam(":CursoPorEnsenar",$CursoPorEnsenar);
    $sentence->execute();
    header("Location:index.php");
  }

?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Datos del Mentor
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="MentorID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="MentorID" id="MentorID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" value="<?php echo $Nombre;?>"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Contrasena" class="form-label">Contrasena</label>
              <input type="text" value="<?php echo $Contrasena;?>"
                class="form-control" name="Contrasena" id="Contrasena" aria-describedby="helpId" placeholder="Contrasena">
            </div>
            <div class="mb-3">
              <label for="Ubicacion" class="form-label">Ubicacion</label>
              <input type="text" value="<?php echo $Ubicacion;?>"
                class="form-control" name="Ubicacion" id="Ubicacion" aria-describedby="helpId" placeholder="Ubicacion">
            </div>
            <div class="mb-3">
              <label for="Institucion" class="form-label">Inst. Educativa</label>
              <input type="text" value="<?php echo $Institucion;?>"
                class="form-control" name="Institucion" id="Institucion" aria-describedby="helpId" placeholder="Inst. Educativa">
            </div>
            <div class="mb-3">
              <label for="CursoPorEnsenar" class="form-label">Curso a Ensenar</label>
              <input type="text" value="<?php echo $CursoPorEnsenar;?>"
                class="form-control" name="CursoPorEnsenar" id="CursoPorEnsenar" aria-describedby="helpId" placeholder="Correo">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>