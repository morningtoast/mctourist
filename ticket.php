<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>McTourist</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<!-- Dev pointers only; Change to compiled bundles for production -->
	<link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="assets/js/lib/modernizr-2.6.2.min.js"></script>
	<script src="assets/js/lib/mustache.js"></script>
	<script src="assets/js/helpers.js"></script>
	<script src="assets/js/global.js"></script>
	<script src="assets/js/main.js"></script>
</head>
<body id="home" data-module="Main" data-uid="123abc">
	<div id="layout">
		<div id="header">
			<h1>Minecraft Tourist</h1>
		</div>
		<div class="clear">
			<div id="currentpos">
					<h4>Where are you located?</h4>
					<input type="number" id="locatex" name="x" placeholder="X" size="5" />
					<input type="number" id="locatez" name="z" placeholder="Z" size="5" />
					<input type="button" id="submit_locateplayer" name="locate" value="Locate" />
				</div>
			<div id="readout" class="loading"><span class="icon"></span></div>
			<div id="controls">
				
				<div id="newpin">
					<h4>Add a new location</h4>
					<form id="newlocation">
						<div class="coords">
							<input type="text" name="newx" id="newx" placeholder="X" size="5" />
							<input type="text" name="newz" id="newz" placeholder="Y" size="5" />
							<select id="landmark" name="style">
								<option value="Cave">Cave</option>
								<option value="Structure">Structure</option>
								<option value="Mineshaft">Mineshaft</option>
								<option value="Village">Village</option>
								<option value="Portal">Portal</option>
								<option value="Stronghold">Stronghold</option>
								<option value="Temple">Temple</option>
							</select>
						</div>
						<div class="desc">
							<input type="text" name="name" placeholder="Location name (optional)" size="20" />
						</div>
						<input type="hidden" name="uid" value="123abc" />
						<input type="submit" id="savenew" name="savenew" value="Save location" />
					</form>
				</div>
				
			
			</div>
		</div>
		<table id="locations">
			<tr>
				<th>&nbsp;</th>
				<th>Location</th>
				<th class="int">X</th>
				<th class="int">Z</th>
				<th>&nbsp;</th>
			</tr>
		</table>
	</div>
	<script type="text/js-template" id="tmpl-readout">
		<div class="prefix">{{prefix}}</div>
		<div class="direction">{{direction}}</div>
		<div class="suffix">{{suffix}}</div>
	</script>
	<script type="text/js-template" id="tmpl-list-row">
		<tr class="row" data-id="{{id}}" data-x="{{x}}" data-y="{{y}}" data-z="{{z}}" data-name="{{name}}">
			<td><span class="mapit"></span></td>
			<td class="desc">
				<div class="view">
					{{name}}
					<small>{{style}}</small>
				</div>
				
			</td>
			<td class="int">{{x}}</td>
			<td class="int">{{z}}</td>
			<td><span class="delete"></span></td>
		</tr>
	</script>
</body>
</html>
