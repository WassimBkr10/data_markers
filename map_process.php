<?php



$db_username = 'root';
$db_password = '';
$db_name = 'data_markers';
$db_host = 'localhost';

//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

# Save & delete markers 
if($_POST) 
{

	$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'; 
	if (!$xhr){ 
		header('HTTP/1.1 500 Error: Request must come from Ajax!'); 
		exit();	
	}
	
	
	$mLatLang	= explode(',',$_POST["latlang"]);
	$mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
	$mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
	
	//Delete Marker
	if(isset($_POST["del"]) && $_POST["del"]==true)
	{
		$results = $mysqli->query("DELETE FROM markers WHERE lat=$mLat AND lng=$mLng");
		if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not delete Markers!'); 
		  exit();
		} 
		exit("Done!");
	}
	
	$mName 		= filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$mAddress 	= filter_var($_POST["address"], FILTER_SANITIZE_STRING);
	$mType		= filter_var($_POST["type"], FILTER_SANITIZE_STRING);
	
	$results = $mysqli->query("INSERT INTO markers (name, address, lat, lng, type) VALUES ('$mName','$mAddress',$mLat, $mLng, '$mType')");
	if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not create marker!'); 
		  exit();
	} 
	
	$output = '<h1 class="marker-heading">'.$mName.'</h1><p>'.$mAddress.'</p>';
	exit($output);
}


#Continue generating Map XML 


$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 


$results = $mysqli->query("SELECT * FROM markers");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 


header("Content-type: text/xml"); 


while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("name",$obj->name);
  $newnode->setAttribute("address", $obj->address);  
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("lng", $obj->lng);  
  $newnode->setAttribute("type", $obj->type);	
}

echo $dom->saveXML();
