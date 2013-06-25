<?php
	// Mustache Helper
	require_once($_SERVER["DOCUMENT_ROOT"]."/Mustache/Autoloader.php");
	
	Mustache_Autoloader::register();
	
	class Mustache extends Mustache_Engine {
		function test($v) { echo $v; }
		function source($source, $data) {
			$source = $this->render($source, $data);
			return($source);
		}
		
		function getTemplate($id, $source=false) {
			$code = "";
			
			if (file_exists($source)) {
				$source = file_get_contents($source);
			}
			
			if ($source) {
				$a_list = explode("</script>",$all);
				
				foreach ($a_list as $script) {
					$script .= "\n</script>";
					
					if (stripos($script,'id="'.$id.'"')) {
						$pattern = "/<script[^>]*?>([\s\S]*?)<\/script>/";
						preg_match_all($pattern, $script, $inside_script_array);
					
						$code = trim(current($inside_script_array[1]));
					}
				}
			}
			
			
			return($code);
		}			
	
	
	} // END class
	
	$mustache = new Mustache;
	
?>