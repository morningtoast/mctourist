<?
	$a_route = false;
	$uid     = false;
	$view    = false;
	$action  = false;
	$a_js    = array("Main");

	if (!$_GET["route"]) { 
		$a_route = "home";
	} else {
		$a_route = $_GET["route"];
	}
	
	$a_args     = explode("/", $a_route);
	$controller = array_shift($a_args);
	
	switch ($controller) {
		default:
		case "home":
			$view = "home.php";
			break;
			
			
		case "map":
			$view   = "ticket.php";
			$uid    = array_shift($a_args);
			$action = array_shift($a_args);
			
			if ($action) {
				switch ($action) {
					default:break;
					
					case "add":
						$view   = "add.php";
						$a_js[] = "Add";
						break;
						
					case "list":
						$view = "list.php";
						$a_js[] = "List";
						break;
				
				}
			}
			
			break;
	
	}
	
	$jsModules = implode(".", $a_js);
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>McTourist</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Dev pointers only; Change to compiled bundles for production -->
	<link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/assets/css/reset.css">
	<link rel="stylesheet" href="/assets/css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/assets/js/lib/modernizr-2.6.2.min.js"></script>
	<script src="/assets/js/lib/mustache.js"></script>
	<script src="/assets/js/helpers.js"></script>
	<script src="/assets/js/global.js"></script>
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/add.js"></script>
	<script src="/assets/js/list.js"></script>
</head>
<body id="home" data-module="<?= $jsModules; ?>" data-uid="<?= $uid; ?>">
	<? include_once($view); ?>
</body>
</html>