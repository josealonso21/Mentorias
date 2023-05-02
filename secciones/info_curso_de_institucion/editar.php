<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM informaciondecursoporinstitucion WHERE ID=:ID");
    $sentence->bindValue(':ID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $Facultad=$registro["Facultad"];
    $Carrera=$registro["Carrera"];
    $CicloDeCurso=$registro["CicloDeCurso"];
    $Modalidad=$registro["Modalidad"];
}
if($_POST){
    $ID=(isset($_POST["ID"])?$_POST["ID"]:"");
    $Facultad=(isset($_POST["Facultad"])?$_POST["Facultad"]:"");
    $Carrera=(isset($_POST["Carrera"])?$_POST["Carrera"]:"");
    $CicloDeCurso=(isset($_POST["CicloDeCurso"])?$_POST["CicloDeCurso"]:"");
    $Modalidad=(isset($_POST["Modalidad"])?$_POST["Modalidad"]:"");
  
    $sentence=$con->prepare("UPDATE informaciondecursoporinstitucion SET ID=:ID,Facultad=:Facultad,Carrera=:Carrera,CicloDeCurso=:CicloDeCurso,Modalidad=Modalidad WHERE ID=:ID");
    $sentence->bindParam(":ID",$txtID);
    $sentence->bindParam(":Facultad",$Facultad);
    $sentence->bindParam(":Carrera",$Carrera);
    $sentence->bindParam(":CicloDeCurso",$CicloDeCurso);
    $sentence->bindParam(":Modalidad",$Modalidad);
    $sentence->execute();
    header("Location:index.php");
  }

?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
    Informacion del curso de la institucion
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="ID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Facultad" class="form-label">Facultad</label>
              <input type="text" value="<?php echo $Facultad;?>"
                class="form-control" name="Facultad" id="Facultad" aria-describedby="helpId" placeholder="Facultad">
            </div>
            <div class="mb-3">
              <label for="Carrera" class="form-label">Carrera</label>
              <input type="text" value="<?php echo $Carrera;?>"
                class="form-control" name="Carrera" id="Carrera" aria-describedby="helpId" placeholder="Carrera">
            </div>
            <div class="mb-3">
              <label for="CicloDeCurso" class="form-label">CicloDeCurso</label>
              <input type="text" value="<?php echo $CicloDeCurso;?>"
                class="form-control" name="CicloDeCurso" id="CicloDeCurso" aria-describedby="helpId" placeholder="CicloDeCurso">
            </div>
            <div class="mb-3">
              <label for="Modalidad" class="form-label">Modalidad</label>
              <input type="text" value="<?php echo $Modalidad;?>"
                class="form-control" name="Modalidad" id="Modalidad" aria-describedby="helpId" placeholder="Modalidad">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>