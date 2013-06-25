
<table class="location-list" width="100%" cellpadding="0" cellspacing="0" border="0">
	{{#list}}
		<tr class="rowtop" data-id="{{id}}" data-x="{{x}}" data-y="{{y}}" data-z="{{z}}" data-name="{{name}}">
			<td colspan="3" width="90%" class="bottom">
				<div class="name">{{name}}</div>
			</td>
			<td rowspan="2" class="icon">
				<a href="#" data-id="{{id}}" class="action">##</a>
			</td>
		</tr>
		<tr class="rowbottom">
			<td class="landmark">
				{{landmark}}
			</td>
			<td class="coord">
				{{x}}
				<small class="label">X</small>
			</td>
			<td class="coord">
				{{z}}
				<small class="label">Z</small>
			</td>
		</tr>
	{{/list}}
</table>