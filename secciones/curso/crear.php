<?php include("../../db.php");
if($_POST){
  $CursoID=(isset($_POST["CursoID"])?$_POST["CursoID"]:"");
  $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
  $Tipo=(isset($_POST["Tipo"])?$_POST["Tipo"]:"");
  $Modalidad=(isset($_POST["Modalidad"])?$_POST["Modalidad"]:"");
  $Costo=(isset($_POST["Costo"])?$_POST["Costo"]:"");
  $CantidadMentores=(isset($_POST["CantidadMentores"])?$_POST["CantidadMentores"]:"");
  $HorasSemana=(isset($_POST["HorasSemana"])?$_POST["HorasSemana"]:"");

  $sentence=$con->prepare("INSERT INTO curso(CursoID,Nombre,Costo,CantidadMentores,HorasSemana,Modalidad,Tipo) 
                            VALUES (:CursoID,:Nombre,:Costo,:CantidadMentores,:HorasSemana,:Modalidad,:Tipo)");
  $sentence->bindParam(":CursoID",$CursoID);
  $sentence->bindParam(":Nombre",$Nombre);
  $sentence->bindParam(":Costo",$Costo);
  $sentence->bindParam(":CantidadMentores",$CantidadMentores);
  $sentence->bindParam(":HorasSemana",$HorasSemana);
  $sentence->bindParam(":Modalidad",$Modalidad);
  $sentence->bindParam(":Tipo",$Tipo);
  $sentence->execute();
  header("Location:index.php");
}
?>
<?php include("../../templates/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">
        Curso
    </div>
    <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
              <label for="CursoID" class="form-label">ID</label>
              <input type="text"
                class="form-control" name="CursoID" id="CursoID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Tipo" class="form-label">Tipo</label>
              <input type="text"
                class="form-control" name="Tipo" id="Tipo" aria-describedby="helpId" placeholder="Tipo">
            </div>
            <div class="mb-3">
              <label for="Modalidad" class="form-label">Modalidad</label>
              <input type="text"
                class="form-control" name="Modalidad" id="Modalidad" aria-describedby="helpId" placeholder="Modalidad">
            </div>
            <div class="mb-3">
              <label for="Costo" class="form-label">Costo de curso</label>
              <input type="text"
                class="form-control" name="Costo" id="Costo" aria-describedby="helpId" placeholder="Costo">
            </div>
            <div class="mb-3">
              <label for="CantidadMentores" class="form-label">Cantidad de mentores</label>
              <input type="text"
                class="form-control" name="CantidadMentores" id="CantidadMentores" aria-describedby="helpId" placeholder="Cantidad Mentores">
            </div>
            <div class="mb-3">
              <label for="HorasSemana" class="form-label">Horas por Semana</label>
              <input type="text"
                class="form-control" name="HorasSemana" id="HorasSemana" aria-describedby="helpId" placeholder="Horas por Semana">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>