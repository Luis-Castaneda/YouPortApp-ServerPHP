<?php 


include('controlBD.php');

$data=array();

$query = "SELECT DISTINCT(se.Id_Services), se.*, con.Value_Parameter  FROM services se , services_company sec ,company co , promotion pro, configuration_master con WHERE
se.Id_Services = sec.Id_Services AND
sec.Id_Company = co.Id_Company and 
pro.Id_Company = co.Id_Company and
con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE' AND
Enabled = 1";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);


?>