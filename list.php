<div id="layout-list">
	<div class="container">
		<div class="menu">
			<a href="/map/<?= $uid; ?>/" class="close">Close</a></li>
		</div>
	</div>
	<table class="location-list" width="100%" cellpadding="0" cellspacing="0" border="0"></table>
</div>	
<script type="text/js-template" id="tmpl-deleted">
	<div class="success-message">
		<h3>Location deleted</h3>
		<h2>{{name}}</h2>
		<p>
			<a href="/map/<?= $uid; ?>/list" class="button">Continue</a>
		</p>
	
	</div>
</script>