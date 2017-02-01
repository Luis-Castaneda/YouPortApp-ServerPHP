<?php 


include('controlBD.php');

if(isset($_GET['idCompany']))
 {
	
$data=array(); 
	 
$id=$_GET['idCompany'];


	$query = "Select 
	co.Address, co.Id_Company ,co.`Name`, co.Phone_Office_One, co.Fax, co.Web_Site, co.Url_Image, 
	con.Email_Contact,
	pro.Description, pro.Url_Imagel , pro.Name_Promotion
	from  company co , contact con, promotion pro WHERE
	con.Id_Company= co.Id_Company AND
	pro.Id_Company = co.Id_Company AND
	co.Id_Company = '$id'";

 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

}

?>