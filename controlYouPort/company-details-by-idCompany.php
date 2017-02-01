<?php 


include('controlBD.php');

if(isset($_GET['idCompany']))
 {
	
$data=array(); 
	 
$id=$_GET['idCompany'];

$query = "Select sc.Paragraph , co.Address, con.Email_Contact, co.Id_Company ,co.`Name`, co.Phone_Office_One, co.Fax, co.Web_Site, co.Url_Image, se.Id_Section, se.Enabled 
from section_company sc , company co , section_menu_company se, contact con WHERE
sc.Id_Company = co.Id_Company AND
sc.Id_Section= se.Id_Section AND
con.Id_Company= co.Id_Company AND
se.Enabled = true AND
co.Id_Company = '$id'";

 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

}

?>