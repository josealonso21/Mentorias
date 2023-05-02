<?php include("../../db.php"); 

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("DELETE FROM curso WHERE CursoID=:CursoID");
    $sentence->bindValue(':CursoID', $txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence = $con->prepare("SELECT * FROM `curso`");
$sentence->execute();
$list_tb_curso=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>

<br/>
<h4>Curso</h4>
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
                        <th scope="col">Tipo</th>
                        <th scope="col">Modalidad</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Cantidad Mentores</th>
                        <th scope="col">Horas Semana</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list_tb_curso as $registro){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['CursoID']?></td>
                        <td><?php echo $registro['Nombre']?></td>
                        <td><?php echo $registro['Tipo']?></td>
                        <td><?php echo $registro['Modalidad']?></td>
                        <td><?php echo $registro['Costo']?></td>
                        <td><?php echo $registro['CantidadMentores']?></td>
                        <td><?php echo $registro['HorasSemana']?></td>
                        <td>
                        <a  class="btn btn-info" href="editar.php?txtID=<?php echo $registro['CursoID'];?>" role="button">Editar</a>
                            <a  class="btn btn-danger" href="index.php?txtID=<?php echo $registro['CursoID'];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../../templates/footer.php"); ?>