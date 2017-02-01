<?php 


include('controlBD.php');

$data=array();

$query = "SELECT mo.Id_Menu, mo.`Name`, mo.Description_Short, mo.Url_Image_Normal, mo.Url_Image_Over,mo.Enabled ,vi.Url, con.Value_Parameter FROM menu_option mo, `view` vi, configuration_master con
where vi.Id_View = mo.Id_View
and mo.Enabled = 1
and Id_Menu_type = 1
and con.Name_Parameter = 'UPLOAD_DIRECTORY_ABSOLUTE'";
 
$ResultBD= mysqli_query($conexion,$query);

while ($row=mysqli_fetch_object($ResultBD)){
 $data[]=$row;
}
echo json_encode($data);


?>