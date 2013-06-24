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
			<div id="layout-home" class="container">
				<h2>Welcome</h2>
				<p>
					<a href="#" id="createnew">Create new book</a>
				</p>
				<p>
					<input type="text" id="existing-id" placeholder="Map code" />
					<input type="button" id="load-existing" value="Load" />
				</p>
			</div>
		</div>
	</div>