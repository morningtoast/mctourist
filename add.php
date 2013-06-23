<div id="layout-add">
	<div class="container">
		<div class="menu">
			<a href="/map/<?= $uid; ?>/" class="close">Close</a></li>
		</div>
	</div>
	
	<form id="add-form">
		<h4>Add a new location</h4>
		<div class="coords row">
			<input type="text" name="newx" id="newx" placeholder="X" size="5" />
			<input type="text" name="newz" id="newz" placeholder="Z" size="5" />
		</div>
		<div class="landmark row">
			<select name="landmark">
				<option value="Cave">Cave</option>
				<option value="Man-made">Man-made</option>
				<option value="Mineshaft">Mineshaft</option>
				<option value="Village">Village</option>
				<option value="Portal">Portal</option>
				<option value="Stronghold">Stronghold</option>
				<option value="Temple">Temple</option>
				<option value="Misc">Misc</option>
			</select>
		</div>
		<div class="description row">
			<input type="text" name="name" placeholder="Custom name (optional)" size="20" />
		</div>
		<div class="submit row">
			<input type="hidden" name="uid" value="<?= $uid; ?>" />
			<input type="submit" id="submit-new" name="submit-new" value="Save location" />
		</div>
		<div class="submit row">
			<input type="button" class="cancel" value="Cancel" />
		</div>
	</form>
</div>
<script type="text/js-template" id="tmpl-success">
	<div class="success-message">
		<h3>New location saved</h3>
		<h2>{{name}}</h2>
		<p>
			<a href="/map/<?= $uid; ?>/" class="button">Continue</a>
		</p>
	
	</div>
</script>