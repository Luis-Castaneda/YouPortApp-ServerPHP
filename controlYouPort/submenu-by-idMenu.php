<?php 


include('controlBD.php');

if(isset($_GET['idMenu']))
 {
	
$data=array(); 
	 
$id=$_GET['idMenu'];


$query = "SELECT mo.Id_Menu , mo.`Name` as NameMenu, smo.`Name` as NameSubMenu  , vi.Url , tv.Id_Type_View
FROM menu_option mo , sub_menu_options smo , `view` vi , type_view tv
WHERE smo.Id_Menu = mo.Id_Menu AND 
smo.Id_View = vi.Id_View AND 
vi.Id_Type_View = tv.Id_Type_View and
mo.Id_Menu = '$id'";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);

}

?>