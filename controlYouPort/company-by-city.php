<?php 

include('controlBD.php');

if(isset($_GET['provincia'])){
	
	$data=array(); 
	$provincia=$_GET['provincia'];
	print($provincia);
	$query = "SELECT c.*, p.provincia FROM company c 
	LEFT JOIN provincias p ON c.Id_City = p.id_provincia 
	WHERE p.provincia = '$provincia'";
	$ResultBD= mysqli_query($conexion,$query);

	while ($row=mysqli_fetch_object($ResultBD)){
	 $data[]=$row;
	}
		echo json_encode($data);
}else{
	echo "[]";
}



?>