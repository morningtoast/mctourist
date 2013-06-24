<div id="layout-list">
	<div class="container">
		<div class="menu">
			<a href="/map/<?= $uid; ?>/" class="close">Close</a></li>
		</div>
	</div>
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
<script type="text/js-template" id="tmpl-deleted">
	<div class="success-message">
		<h3>Location deleted</h3>
		<h2>{{name}}</h2>
		<p>
			<a href="/map/<?= $uid; ?>/list" class="button">Continue</a>
		</p>
	
	</div>
</script>