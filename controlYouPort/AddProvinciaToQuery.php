<?php 


/**
*	Función encargada de validar si una cadena es nula o no
*/
 function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}
 
 /**
 *	Función utilitaria encargada de loguear en caso que haga falta
 *	a fin de evitar uso extensivo de 'echo'
 */
 function consoleDebug($toDebug){
	 //echo $toDebug;	 
 }
 
 /*
 * Función que orquesta el añadido de filtrado por provincia
 * en un query. Debe contener en la seccion de 'FROM' 'company co'
 * 
 */
 function addProvinciaToQuery($query){

    $provincia=$_GET['provincia'];
	$from = "FROM";
	 $where = "WHERE";
	 $and = " AND ";
 
	 
	if(!IsNullOrEmptyString($provincia)){

	$columnsAndTheRest = explode ( $from , $query );
	
	$TablesAndconditions = explode ( $where , $columnsAndTheRest[1] );
	
	//$columnsAndTheRest[1]
	
	//$where
	
	//echo strpos ( $query , $from );
	consoleDebug("| Tablas: $TablesAndconditions[0]");	
	consoleDebug("<br>| Condiciones: $TablesAndconditions[1]");
	
	
	$TablesAndconditions[0] = $TablesAndconditions[0].", provincias p ";
	
	$TablesAndconditions[1] = $TablesAndconditions[1].$and."co.Id_City = p.id_provincia $and p.provincia = '$provincia' ";  
	
	
	$query = $columnsAndTheRest[0].$from.$TablesAndconditions[0].$where.$TablesAndconditions[1];
	
	
	}
	consoleDebug("<br>| Query: $query");
	return $query;
}




//isilva solo para pruebas unitarias de este archivo
 /*$provincia = "Barcelona";
 $query = "SELECT se.Id_Services, se.Name_Services , co.Id_Company, co.`Name`,  co.Url_Image 
	FROM services se, company co,
	services_company  sc 
	WHERE 
	sc.Id_Services = se.Id_Services AND 
	sc.Id_Company = co.Id_Company AND 
	sc.Id_Services = '1'";
*/

//addProvinciaToQuery($query , $provincia);

?>