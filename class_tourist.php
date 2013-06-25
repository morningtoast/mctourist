<?
include_once("cfw.inc.php");
include_once("Mustache.php");

class tourist {
	
	// Constructor
	function tourist() {
		$this->path_save = $_SERVER["DOCUMENT_ROOT"]."/data/";
		$this->uid       = false;
		$this->themes    = array("blue","red","green","orange");
		$this->landmarks = array(
			"CAV" => "Cave",
			"MST" => "Mineshaft",
			"VIL" => "Village",
			"TPL" => "Temple",
			"CSM" => "Custom",
			"STR" => "Stronghold",
			"PTL" => "Portal"
		);
	}
	
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	// Checks to see if book file exists
	function bookExists($code) {
		if (file_exist($this->path_save.$code)) {
			return(true);
		} else {
			return(false);
		}
	}
	
	
	// Generates random hash for book ID
	function getNewCode() {
		$code = strtolower(str_randomchar(6));
		
		while (file_exists($this->path_save.$code)) {
			$code = strtolower(str_randomchar(6));
		}
		
		return($code);
	}
	
	
	// Creates a new book with random hash, write example data
	function createBook() {
		shuffle($this->themes);
	
		$code       = $this->getNewCode();
		$example1Id = time();
		$example2Id = ($example1Id + 1);
	
		$a_newBook = array(
			"uid"       => $code,
			"created"   => date("r"),
			"updated"   => date("Y-m-d"),
			"theme"     => current($this->themes),
			"locations" => array(
				$example1Id => array(
					"id" => $example1Id,
					"x"  => rand(-500, 500),
					"z"  => rand(-500, 500),
					"name"     => "Example spot #1",
					"landmark" => "Cave",
					"port" => "EX1"
				),
				$example2Id => array(
					"id" => $example2Id,
					"x"  => rand(-500, 500),
					"z"  => rand(-500, 500),
					"name"     => "Example spot #2",
					"landmark" => "Village",
					"port" => "EX2"
				),
			),
			"recent" => array(
				"from" => $example1Id,
				"to"   => $example2Id
			)
		);
		
		$code   = $this->saveBook($code, $a_newBook);
		return($code);
	}
	
	
	// Encodes data and writes JSON to save file by code 
	function saveBook($code, $data) {
		$json = json_encode($data);
		
		$fr = fopen($this->path_save.$code, "w");
		fwrite($fr, $json);
		fclose($fr);
		
		return($code);
	}
	
	
	function getBook($code) {
		$a_json = array();
		
		if (file_exists($this->path_save.$code)) {
			$a_json = json_decode(file_get_contents($this->path_save.$code));
			$a_json =  (array) $a_json;
			$a_json["locations"] = (array) $a_json["locations"];
			$a_json["recent"] = (array) $a_json["recent"];
		}
		
		return($a_json);
	}
}


$m = new tourist();



?>