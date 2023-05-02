<?php 
include("../../db.php");
if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("SELECT * FROM curso WHERE CursoID=:CursoID");
    $sentence->bindValue(':CursoID', $txtID);
    $sentence->execute();

    $registro=$sentence->fetch(PDO::FETCH_LAZY);
    $CursoID=$registro["CursoID"];
    $Nombre=$registro["Nombre"];
    $Tipo=$registro["Tipo"];
    $Modalidad=$registro["Modalidad"];
    $Costo=$registro["Costo"];
    $CantidadMentores=$registro["CantidadMentores"];
    $HorasSemana=$registro["HorasSemana"];
}
if($_POST){
    $CursoID=(isset($_POST["CursoID"])?$_POST["CursoID"]:"");
    $Nombre=(isset($_POST["Nombre"])?$_POST["Nombre"]:"");
    $Tipo=(isset($_POST["Tipo"])?$_POST["Tipo"]:"");
    $Modalidad=(isset($_POST["Modalidad"])?$_POST["Modalidad"]:"");
    $Costo=(isset($_POST["Costo"])?$_POST["Costo"]:"");
    $CantidadMentores=(isset($_POST["CantidadMentores"])?$_POST["CantidadMentores"]:"");
    $HorasSemana=(isset($_POST["HorasSemana"])?$_POST["HorasSemana"]:"");
  
    $sentence=$con->prepare("UPDATE curso SET CursoID=:CursoID,Nombre=:Nombre,Costo=:Costo,CantidadMentores=:CantidadMentores,HorasSemana=:HorasSemana,Modalidad=:Modalidad,Tipo=:Tipo  WHERE CursoID=:CursoID");
    $sentence->bindParam(":CursoID",$txtID);
    $sentence->bindParam(":Nombre",$Nombre);
    $sentence->bindParam(":Tipo",$Tipo);
    $sentence->bindParam(":Modalidad",$Modalidad);
    $sentence->bindParam(":Costo",$Costo);
    $sentence->bindParam(":CantidadMentores",$CantidadMentores);
    $sentence->bindParam(":HorasSemana",$HorasSemana);
    $sentence->execute();
    header("Location:index.php");
  }

?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Datos del Curso
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="CursoID" class="form-label">ID</label>
              <input type="text" value="<?php echo $txtID;?>"
                class="form-control" name="CursoID" id="CursoID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" value="<?php echo $Nombre;?>"
                class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label for="Tipo" class="form-label">Tipo</label>
              <input type="text" value="<?php echo $Tipo;?>"
                class="form-control" name="Tipo" id="Tipo" aria-describedby="helpId" placeholder="Tipo">
            </div>
            <div class="mb-3">
              <label for="Modalidad" class="form-label">Modalidad</label>
              <input type="text" value="<?php echo $Modalidad;?>"
                class="form-control" name="Modalidad" id="Modalidad" aria-describedby="helpId" placeholder="Modalidad">
            </div>
            <div class="mb-3">
              <label for="Costo" class="form-label">Costo</label>
              <input type="text" value="<?php echo $Costo;?>"
                class="form-control" name="Costo" id="Costo" aria-describedby="helpId" placeholder="Costo">
            </div>
            <div class="mb-3">
              <label for="Modalidad" class="form-label">Modalidad</label>
              <input type="text" value="<?php echo $Modalidad;?>"
                class="form-control" name="Modalidad" id="Modalidad" aria-describedby="helpId" placeholder="Modalidad">
            </div>
            <div class="mb-3">
              <label for="CantidadMentores" class="form-label">Cantidad de Mentores</label>
              <input type="text" value="<?php echo $CantidadMentores;?>"
                class="form-control" name="CantidadMentores" id="CantidadMentores" aria-describedby="helpId" placeholder="Cantidad de Mentores">
            </div>
            <div class="mb-3">
              <label for="HorasSemana" class="form-label">Horas por Semana</label>
              <input type="text" value="<?php echo $HorasSemana;?>"
                class="form-control" name="HorasSemana" id="HorasSemana" aria-describedby="helpId" placeholder="Horas por Semana">
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php"); ?>