<?php 


include('controlBD.php');

$data=array();

$query = "SELECT se.*, con.Value_Parameter FROM services se,configuration_master con WHERE Enabled = 1 and con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE'";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}

echo json_encode($data);


?>