<?php 


include('controlBD.php');

if(isset($_GET['idServices']))
 {
	
$data=array(); 
	 
$id=$_GET['idServices'];
$provincia=$_GET['provincia'];

/*$query = "SELECT se.Id_Services  ,se.Name_Services , co.Id_Company, co.`Name`,  co.Url_Image , con.Value_Parameter
FROM services se, company co,services_company  sc, configuration_master con 
WHERE 
sc.Id_Services = se.Id_Services AND 
sc.Id_Company = co.Id_Company AND
con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE' AND 
sc.Id_Services = '$id'";*/

$query = "SELECT se.Id_Services  ,se.Name_Services , co.Id_Company, co.`Name`,  co.Url_Image ,con.Value_Parameter
FROM services se, company co,
services_company  sc, provincias p  ,configuration_master con 
WHERE 
sc.Id_Services = se.Id_Services AND 
sc.Id_Company = co.Id_Company AND 
co.Id_City = p.id_provincia AND
con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE' AND
sc.Id_Services = '$id' AND
p.provincia = '$provincia'";

//echo "query: $query";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

}

?>