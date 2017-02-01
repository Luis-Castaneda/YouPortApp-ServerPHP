<?php 


include('controlBD.php');

$data=array();

$query = "Select Value_Parameter from configuration_master where Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE'";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);


?>