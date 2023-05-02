<?php include("../../db.php"); 

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("DELETE FROM informaciondecursoporinstitucion WHERE ID=:ID");
    $sentence->bindValue(':ID', $txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence = $con->prepare("SELECT * FROM `informaciondecursoporinstitucion`");
$sentence->execute();
$list_tb_infCI=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>

<br/>
<h4>Informacion del curso de la institucion</h4>
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
                        <th scope="col">Facultad</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Ciclo del Curso</th>
                        <th scope="col">Modalidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list_tb_infCI as $registro){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['ID']?></td>
                        <td><?php echo $registro['Facultad']?></td>
                        <td><?php echo $registro['Carrera']?></td>
                        <td><?php echo $registro['CicloDeCurso']?></td>
                        <td><?php echo $registro['Modalidad']?></td>
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