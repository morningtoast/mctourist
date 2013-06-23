<?
	$a_route = false;
	$uid     = false;

	if (!$_GET["route"]) { 
		$a_route = "home";
	} else {
		$a_route = $_GET["route"];
	}
	
	
	$a_args     = explode("/", $a_route);
	$controller = array_shift($a_args);
	$view       = false;
	
	switch ($controller) {
		default:
		case "home":
			$view = "home.php";
			break;
			
			
		case "list":
			$view = "ticket.php";
			$uid  = array_shift($a_args);
			break;
	
	}
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
	<link rel="stylesheet" href="./assets/css/reset.css">
	<link rel="stylesheet" href="./assets/css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/projects/mctourist/assets/js/lib/modernizr-2.6.2.min.js"></script>
	<script src="/projects/mctourist/assets/js/lib/mustache.js"></script>
	<script src="/projects/mctourist/assets/js/helpers.js"></script>
	<script src="/projects/mctourist/assets/js/global.js"></script>
	<script src="/projects/mctourist/assets/js/main.js"></script>
</head>
<body id="home" data-module="Main" data-uid="<?= $uid; ?>">
	<? include_once($view); ?>
</body>
</html>