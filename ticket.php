
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
					<h4>Enter a destination</h4>
					<input type="text" id="customx" placeholder="X" pattern="\d+(\.\d*)?" />
					<input type="text" id="customz" placeholder="Z" pattern="\d+(\.\d*)?" />
					<input type="button" id="set-custom" value="Set" />
				</div>
				<div id="list-location">
					<h4>Or select a destination</h4>
					<table class="location-list" width="100%" cellpadding="0" cellspacing="0" border="0">
						<? for ($a=0; $a < 15; $a++) { ?>
						<tr class="rowtop">
							<td colspan="3" width="90%" class="bottom">
								<div class="name">Name of place</div>
							</td>
							<td rowspan="2" class="icon">
								<a href="#" data-id="12345678" class="action">-</a>
							</td>
						</tr>
						<tr class="rowbottom">
							<td class="landmark">
								Mineshaft
							</td>
							<td class="coord">
								13500
								<small class="label">X</small>
							</td>
							<td class="coord">
								-3500
								<small class="label">Z</small>
							</td>
						</tr>
						<!-- row -->
						<? } ?>
					</table>
				</div>
			</div>
		
		</div>
		
		
	</div>
	<script type="text/js-templte" id="tmpl-ticket">
		<ul id="flipper">
			<li id="change-from" class="station">
				<div class="label">CURRENT</div>
				<h2>{{fromport}}</h2>
				<div class="desc">{{fromlandmark}}</div>
				<div class="coords">{{fromx}}, {{fromz}}</div>
			</li>
			<li class="icon"><span>TO</span></li>
			<li id="change-dest" class="station">
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