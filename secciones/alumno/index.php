<?php include("../../db.php"); 

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("DELETE FROM alumno WHERE AlumnoID=:AlumnoID");
    $sentence->bindValue(':AlumnoID', $txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence = $con->prepare("SELECT * FROM `alumno`");
$sentence->execute();
$list_tb_alumno=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>

<br/>
<h4>Alumno</h4>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contrasena</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Inst. Educativa</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($list_tb_alumno as $registro){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['AlumnoID']?></td>
                        <td><?php echo $registro['Nombre']?></td>
                        <td><?php echo $registro['Correo']?></td>
                        <td><?php echo $registro['Contrasena']?></td>
                        <td><?php echo $registro['Ubicacion']?></td>
                        <td><?php echo $registro['Institucion']?></td>
                        <td>
                        <a  class="btn btn-info" href="editar.php?txtID=<?php echo $registro['AlumnoID'];?>" role="button">Editar</a>
                            <a  class="btn btn-danger" href="index.php?txtID=<?php echo $registro['AlumnoID'];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?php include("../../templates/footer.php"); ?>