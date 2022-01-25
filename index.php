<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Alumnos</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Alumno</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
			            <th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                 
                <tbody>    
                          
                </tbody>
            </table>
        </div>
    </div>
    <?php 
                include ('database.php');
                $alumnos = new Database();
                $listado=$alumnos->read();
            ?>
            <?php 
                while ($row=mysqli_fetch_object($listado)){
                $matricula=$row->matricula;
                $nombre=$row->nombre." ".$row->apellido;
                $direccion=$row->direccion;
                $email=$row->correo_electronico;
                ?>
                <tr>
                <td><?php echo $nombre;?></td>
                <td><?php echo $direccion;?></td>
                <td><?php echo $email;?></td>
                <td>
                <a href="update.php?id=<?php echo $matricula;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                <a href="delete.php?id=<?php echo $matricula;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                </td>
                </tr>	
                <?php
                }
            ?>     
</body>
</html>