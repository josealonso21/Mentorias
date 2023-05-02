<?php include("../../db.php"); 

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentence=$con->prepare("DELETE FROM ubicacion WHERE UbicacionID=:UbicacionID");
    $sentence->bindValue(':UbicacionID', $txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence = $con->prepare("SELECT * FROM `ubicacion`");
$sentence->execute();
$list_tb_ubicacion=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>
<br/>
<h4>Ubicacion</h4>
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
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list_tb_ubicacion as $registro){ ?>
                    <tr class="">
                        <td scope="row"><?php echo $registro['UbicacionID']?></td>
                        <td><?php echo $registro['Nombre']?></td>
                        <td><?php echo $registro['Ubicacion']?></td>
                        <td>
                        <a  class="btn btn-info" href="editar.php?txtID=<?php echo $registro['UbicacionID'];?>" role="button">Editar</a>
                         <a  class="btn btn-danger" href="index.php?txtID=<?php echo $registro['UbicacionID'];?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>