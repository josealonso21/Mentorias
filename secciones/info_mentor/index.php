<?php include("../../db.php"); 

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("DELETE FROM informaciondementor WHERE ID=:ID");
    $sentence->bindValue(':ID', $txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence = $con->prepare("SELECT * FROM `informaciondementor`");
$sentence->execute();
$list_tb_infmentor=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>

<br/>
<h4>Informacion del mentor</h4>
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
                        <th scope="col">Video de Presentacion</th>
                        <th scope="col">Notas del Curso que dictara</th>
                        <th scope="col">Horario disponible</th>
                        <th scope="col">Calificacion de Servicio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list_tb_infmentor as $registro){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['ID']?></td>
                        <td><?php echo $registro['VideoDePresentacion']?></td>
                        <td><?php echo $registro['NotasDeCurso']?></td>
                        <td><?php echo $registro['HorasDisponible']?></td>
                        <td><?php echo $registro['CalificacionServicio']?></td>
                        <td>
                        <a  class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID'];?>" role="button">Editar</a>
                            <a  class="btn btn-danger" href="index.php?txtID=<?php echo $registro['ID'];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>