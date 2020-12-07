<?php


$url = 'https://deinserver.de/gsales'; // URL zur gSales Installation
$strAPIKey = 'XXXXXXXXXXXXXXXXXX'; // gSales API Key

$strApiWsdlUrl = $url . '/api/api.php?wsdl'; 
ini_set("soap.wsdl_cache_enabled", "0"); 


if(isset($_GET['cid'])) {
    
  $callerID = '+'.substr($_GET['cid'],1); 
 
  $client = new soapclient($strApiWsdlUrl);  
  $arrFilterFestnetz[] = array('field'=>'phone', 'operator'=>'is', 'value'=>$callerID);
  $arrFilterMobil[] = array('field'=>'cellular', 'operator'=>'is', 'value'=>$callerID);
  $arrSort = array('field'=>'customerno', 'direction'=>'asc');
    
  $arrResultFestnetz = $client->getCustomers($strAPIKey,$arrFilterFestnetz,$arrSort,1,0);
  $strJsonFestnetz = json_encode($arrResultFestnetz['result']);
  $arrCustomersFestnetz = json_decode($strJsonFestnetz, true);

  if ($arrCustomersFestnetz[0]['id'] != '') {
      
    $id = $arrCustomersFestnetz[0]['id'];
    header("Location: $url/customer/index.php?p=showcustomer&cid=$id");
 
  } else {
  
    $arrResultMobil = $client->getCustomers($strAPIKey,$arrFilterMobil,$arrSort,1,0);
    $strJsonMobil = json_encode($arrResultMobil['result']);
    $arrCustomersMobil = json_decode($strJsonMobil, true);
    
    if ($arrCustomersMobil[0]['id'] != '') {  
	  
      $id = $arrCustomersMobil[0]['id'];
      header("Location: $url/customer/index.php?p=showcustomer&cid=$id");
	  
    } else {
	
      header("Location: $url/customer/index.php");
	  
	  // Alternativ Neukundendialog öffnen
	  // header("Location: $url/customer/index.php?p=newcustomer");
	  
  
    }

  }
    
}

?>