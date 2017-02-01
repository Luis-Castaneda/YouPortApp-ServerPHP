<?php 


include('controlBD.php');
include('AddProvinciaToQuery.php');

if(isset($_GET['idServices']))
 {
	
$data=array(); 
	 
$id=$_GET['idServices'];

$query = "SELECT DISTINCT(se.Id_Services)  ,se.Name_Services , 
co.Id_Company, co.`Name`,  co.Url_Image , con.Value_Parameter
FROM services se, company co,services_company  sc , promotion pro, configuration_master con
WHERE 
sc.Id_Services = se.Id_Services AND 
sc.Id_Company = co.Id_Company AND 
pro.Id_Company = co.Id_Company AND
con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE' AND
sc.Id_Services = '$id'";
$query = addProvinciaToQuery($query);

 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

}

?>