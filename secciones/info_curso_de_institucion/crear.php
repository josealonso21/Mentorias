<?php include("../../db.php");
if($_POST){
  $ID=(isset($_POST["ID"])?$_POST["ID"]:"");
  $Facultad=(isset($_POST["Facultad"])?$_POST["Facultad"]:"");
  $Carrera=(isset($_POST["Carrera"])?$_POST["Carrera"]:"");
  $CicloDeCurso=(isset($_POST["CicloDeCurso"])?$_POST["CicloDeCurso"]:"");
  $Modalidad=(isset($_POST["Modalidad"])?$_POST["Modalidad"]:"");

  $sentence=$con->prepare("INSERT INTO informaciondecursoporinstitucion(ID,Facultad,Carrera,CicloDeCurso,Modalidad) 
                            VALUES (:ID,:Facultad,:Carrera,:CicloDeCurso,:Modalidad)");
  $sentence->bindParam(":ID",$ID);
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
              <input type="text"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Facultad" class="form-label">Facultad</label>
              <input type="text"
                class="form-control" name="Facultad" id="Facultad" aria-describedby="helpId" placeholder="Facultad">
            </div>
            <div class="mb-3">
              <label for="Carrera" class="form-label">Carrera</label>
              <input type="text"
                class="form-control" name="Carrera" id="Carrera" aria-describedby="helpId" placeholder="Carrera">
            </div>
            <div class="mb-3">
              <label for="Ciclo_del_Curso" class="form-label">Ciclo del Curso</label>
              <input type="text"
                class="form-control" name="CicloDeCurso" id="CicloDeCurso" aria-describedby="helpId" placeholder="Ciclo_del_Curso">
            </div>
            <div class="mb-3">
              <label for="Modalidad" class="form-label">Modalidad</label>
              <input type="text"
                class="form-control" name="Modalidad" id="Modalidad" aria-describedby="helpId" placeholder="Modalidad">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>