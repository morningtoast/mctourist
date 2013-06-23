<?
	if ($_GET["savenew"]) {
		$a_data = $_GET;
		$uid    = $a_data["uid"];
		$file   = $uid.".txt";
		
		if (!file_exists($file)) {
			$fr = fopen($file,"w");
			fwrite($fr, "");
			fclose($fr);
			
			$a_prevData = array();
		} else {
			$json       = file_get_contents($file);
			$a_prevData = json_decode($json, true);
		}
		
		$a_newData = array(
			"id"   => time(),
			"name" => $a_data["name"],
			"style" => $a_data["style"],
			"x"    => $a_data["newx"],
			"z" => $a_data["newz"]
		);
		
		$a_prevData[] = $a_newData;
		
		$newSave = json_encode($a_prevData);
		
			$fr = fopen($uid.".txt","w");
			fwrite($fr, $newSave);
			fclose($fr);
		
	
		echo json_encode($a_newData);
	}
	
	if ($_GET["delete"]) {
		echo json_encode(array("foo"=>123));
	}
?>