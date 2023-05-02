
<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM alumno WHERE AlumnoID=:AlumnoID");
    $sentence->bindValue(':AlumnoID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $Nalumno=$registro["Nombre"];
    $CoAlumno=$registro["Correo"];
    $Calumno=$registro["Contrasena"];
    $Ualumno=$registro["Ubicacion"];
    $IEalumno=$registro["Institucion"];
}
if($_POST){
    $IDalumno=(isset($_POST["AlumnoID"])?$_POST["AlumnoID"]:"");
    $Nalumno=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
    $CoAlumno=(isset($_POST["Correo"])?$_POST["Correo"]:"");
    $Calumno=(isset($_POST["Contrasena"])?$_POST["Contrasena"]:"");
    $Ualumno=(isset($_POST["Ubicacion"])?$_POST["Ubicacion"]:"");
    $IEalumno=(isset($_POST["Institucion"])?$_POST["Institucion"]:"");
  
    $sentence=$con->prepare("UPDATE alumno SET AlumnoID=:AlumnoID,Nombre=:Nombre,Correo=:Correo,Contrasena=:Contrasena,Ubicacion=Ubicacion,Institucion=:Institucion WHERE AlumnoID=:AlumnoID");
    $sentence->bindParam(":AlumnoID",$txtID);
    $sentence->bindParam(":Nombre",$Nalumno);
    $sentence->bindParam(":Correo",$CoAlumno);
    $sentence->bindParam(":Contrasena",$Calumno);
    $sentence->bindParam(":Ubicacion",$Ualumno);
    $sentence->bindParam(":Institucion",$IEalumno);
    $sentence->execute();
    header("Location:index.php");
  }

?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Datos del Alumno
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="AlumnoID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="AlumnoID" id="AlumnoID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" value="<?php echo $Nalumno;?>"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Correo" class="form-label">Correo</label>
              <input type="email" value="<?php echo $CoAlumno;?>"
                class="form-control" name="CoAlumno" id="CoAlumno" aria-describedby="helpId" placeholder="Correo">
            </div>
            <div class="mb-3">
              <label for="Contrasena" class="form-label">Contrasena</label>
              <input type="text" value="<?php echo $Calumno;?>"
                class="form-control" name="Contrasena" id="Contrasena" aria-describedby="helpId" placeholder="Contrasena">
            </div>
            <div class="mb-3">
              <label for="Ubicacion" class="form-label">Ubicacion</label>
              <input type="text" value="<?php echo $Ualumno;?>"
                class="form-control" name="Ubicacion" id="Ubicacion" aria-describedby="helpId" placeholder="Ubicacion">
            </div>
            <div class="mb-3">
              <label for="Institucion" class="form-label">Inst. Educativa</label>
              <input type="text" value="<?php echo $IEalumno;?>"
                class="form-control" name="Institucion" id="Institucion" aria-describedby="helpId" placeholder="Inst. Educativa">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>