
	<div id="layout">
		<div id="layout-ticket">
			<div id="layout-header">
				<div class="container">
					<div class="menu">
						<ul>
							<li><a href="/map/<?= $uid; ?>/" class="home">Home</a></li>
							<li><a href="/map/<?= $uid; ?>/add/" class="add">Add</a></li>
							<li><a href="/map/<?= $uid; ?>/list/" class="menu">Menu</a></li>
						</ul>
					</div>
					<h1>MAYFINDER</h1>
				</div>
			</div>
			<div id="layout-content" class="container">
				<ul id="flipper">
					<li id="change-from" class="station">
						<div class="label">CURRENT</div>
						<h2>ABC</H2>
						<div class="desc">Mineshaft</div>
						<div class="coords">12400, -4599</div>
					</li>
					<li class="icon"><span>TO</span></li>
					<li id="change-dest" class="station">
						<div class="label">DESTINATION</div>
						<h2>XYZ</H2>
						<div class="desc">Village</div>
						<div class="coords">32, 599</div>
					</li>
				</ul>
				<ul id="details">
					<li class="direction">
						<div class="label">DIRECTION</div>
						<h3>SOUTHWEST</h3>
					</li>
					<li class="days">
						<div class="label">DAYS</div>
						<h3>< 1</h3>
					</li>
					<li class="distance">
						<div class="label">DIST</div>
						<h3>155</h3>
					</li>
				</ul>
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
					<ul>
						<li>
							<a href="#">
								Special location name
								<small>Mineshaft</small>
							</a>
						</li>
						<li>
							<a href="#">
								Special location name
								<small>Mineshaft</small>
							</a>
						</li>
						<li>
							<a href="#">
								Special location name
								<small>Mineshaft</small>
							</a>
						</li>
						<li>
							<a href="#">
								Special location name
								<small>Mineshaft</small>
							</a>
						</li>
						<li>
							<a href="#">
								Special location name
								<small>Mineshaft</small>
							</a>
						</li>
					</ul>
				</div>
			</div>
		
		</div>
		
		
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