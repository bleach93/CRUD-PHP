
<?php 
if (isset($_GET['matricula'])){
	include('database.php');
	$cliente = new Database();
	$matricula=intval($_GET['matricula']);
	$res = $cliente->delete($matricula);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
1