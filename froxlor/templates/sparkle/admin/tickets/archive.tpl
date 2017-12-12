$header
	<article>
		<header>
			<h2>
				<img src="templates/{$theme}/assets/img/icons/ticket_archive_big.png" alt="" />&nbsp;
				{$lng['ticket']['lastarchived']}
			</h2>
		</header>

		<section>

			<table class="full">
			<thead>
				<tr>
					<th>{$lng['ticket']['archivedtime']}</th>
					<th>{$lng['ticket']['ticket_answers']}</th>
					<th>{$lng['ticket']['subject']}</th>
					<th>{$lng['ticket']['lastreplier']}</th>
					<th>{$lng['ticket']['priority']}</th>
					<th>{$lng['panel']['options']}</th>
				</tr>
			</thead>
			<tbody>
				$tickets
			</tbody>
			</table>

		</section>

	</article>
	<br />
	<br />
	<article>
		<section>

			<form action="{$linker->getLink(array('section' => 'tickets'))}" method="post" enctype="application/x-www-form-urlencoded">

			<input type="hidden" name="s" value="$s"/>
			<input type="hidden" name="page" value="$page"/>
			<input type="hidden" name="send" value="send" />
	
			<table class="full">
			<thead>
				<tr>
					<th colspan="2">{$lng['ticket']['search']}</th>
				</tr>
			</thead>
			<tr>
				<td>{$lng['ticket']['subject']}:</td>
				<td ><input type="text" name="subject" /></td>
			</tr>
			<tr>
				<td>{$lng['ticket']['priority']}:</td>
				<td >{$priorities_options}</td>
			</tr>
 			<tr>
				<td>{$lng['ticket']['category']}:</td>
				<td>{$category_options}</td>
 			</tr>
 			<tr>
				<td>{$lng['ticket']['lastchange']}:</td>
				<td>
					<label for="fromdate">{$lng['ticket']['lastchange_from']}<br /><input type="text" id="fromdate" name="fromdate" /></label>
					<label for="todate">{$lng['ticket']['lastchange_to']}<br /><input type="text" id="todate" name="todate" /></label>
				</td>
 			</tr>
			<tr>
				<td>{$lng['ticket']['message']}:</td>
				<td><textarea rows="12" cols="50" name="message"></textarea></td>
			</tr>
 			<tr>
				<td>{$lng['ticket']['customer']}:</td>
				<td><select name="customer">$customers</select></td>
 			</tr>
 			<tfoot>
				<tr>
					<td class="main_field_confirm" colspan="2" align="right"><input type="hidden" name="send" value="send" /><input type="submit" class="bottom" value="{$lng['panel']['search']}" /></td>
				</tr>
 			</tfoot>
			</table>

			</form>
		</section>

	</article>
$footer
