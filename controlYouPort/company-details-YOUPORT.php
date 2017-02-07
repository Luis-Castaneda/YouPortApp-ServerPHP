<?php 


include('controlBD.php');

$data=array(); 
	 
$query = "Select co.Address , co.`Name`,co.Phone_Office_One, co.Url_Image, co.Web_Site, con.Email_Contact, conf.Value_Parameter from company co , contact con, configuration_master conf where co.Id_Company = con.Id_Company
and conf.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE' and co.`Name` = 'YOUPORT'";

 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

?>