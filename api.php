<?
	include_once("class_tourist.php");

	$a_get      = $_GET;
	$a_response = array(
		"success" => false,
		"data"    => array()
	);
	
	
	// Create new book
	if ($a_get["new"]) {
		$code = $m->createBook();
		
		$a_response["success"] = true;
		$a_response["data"]    = array(
			"uid" => $code
		);
	}
	
	
	
	// Always echo JSON
	echo json_encode($a_response);
?>