<?
	$a_book = $m->getBook($m->uid);
	$a_list = array("list"=>array());

	foreach ($a_book["locations"] as $a_item) {
		$a_item = (array) $a_item;
		$a_list["list"][] = $a_item;
	}	
	
	$tmpl   = file_get_contents("_listrow.php");
	$html   = $mustache->render($tmpl, $a_list);
?>
	<div id="layout">
		<div id="layout-ticket">
			<div id="layout-header">
				<div class="container">
					<div class="menu">
						<ul>
							<li><a href="#" class="home">Home</a></li>
							<li><a href="/map/<?= $m->uid; ?>/add/" class="add">Add</a></li>
							<li><a href="/map/<?= $m->uid; ?>/list/" class="menu">Menu</a></li>
						</ul>
					</div>
					<h1>MAYFINDER</h1>
				</div>
			</div>
			<div id="layout-content" class="container">
				loading...
			</div>
		</div>

		<div id="layout-switcher">
			<div class="container">
				<div class="menu">
					<a href="" class="close">Close</a></li>
				</div>
			</div>
			<div class="container">
				<div id="custom-location">
					<h4>Enter a <span class="wayto-label"></span></h4>
					<input type="text" id="customx" placeholder="X" pattern="\d+(\.\d*)?" />
					<input type="text" id="customz" placeholder="Z" pattern="\d+(\.\d*)?" />
					<input type="button" id="set-custom" value="Set" />
				</div>
				<div id="list-location">
					<h4>Or select a <span class="wayto-label"></span></h4>
					<?= $html; ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/js-templte" id="tmpl-ticket">
		<ul id="flipper">
			<li id="change-from" class="station" data-label="Starting point">
				<div class="label">CURRENT</div>
				<h2>{{fromport}}</h2>
				<div class="desc">{{fromlandmark}}</div>
				<div class="coords">{{fromx}}, {{fromz}}</div>
			</li>
			<li class="icon"><span>TO</span></li>
			<li id="change-dest" class="station" data-label="Destination">
				<div class="label">DESTINATION</div>
				<h2>{{toport}}</h2>
				<div class="desc">{{tolandmark}}</div>
				<div class="coords">{{tox}}, {{toz}}</div>
			</li>
		</ul>
		<ul id="details">
			<li class="direction">
				<div class="label">DIRECTION</div>
				<h3>{{direction}}</h3>
			</li>
			<li class="days">
				<div class="label">DAYS</div>
				<h3>{{days}}</h3>
			</li>
			<li class="distance">
				<div class="label">DIST</div>
				<h3>{{distance}}</h3>
			</li>
		</ul>	
	</script>