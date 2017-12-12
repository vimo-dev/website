$header
	<article>
		<header>
			<h2>
				<img src="templates/{$theme}/assets/img/icons/lock_big.png" alt="" />&nbsp;
				{$lng['menue']['main']['changepassword']}
			</h2>
		</header>

		<section>
			<form method="post" action="{$linker->getLink(array('section' => 'index'))}" enctype="application/x-www-form-urlencoded">
				<fieldset>
					<input type="hidden" name="s" value="$s" />
					<input type="hidden" name="page" value="$page" />
					<input type="hidden" name="send" value="send" />
					<table class="middle center">
						<tr>
							<td width="50%"><label for="old_password">{$lng['changepassword']['old_password']}:</label></td>
							<td><input type="password" id="old_password" name="old_password" /></td>
						</tr>
						<tr>
							<td><label for="new_password">{$lng['changepassword']['new_password']}:</label></td>
							<td><input type="password" id="new_password" name="new_password" /></td>
						</tr>
						<tr>
							<td><label for="new_password_confirm">{$lng['changepassword']['new_password_confirm']}:</label></td>
							<td><input type="password" id="new_password_confirm" name="new_password_confirm" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="checkbox" name="change_main_ftp" id="change_main_ftp" value="true" />
								<label for="change_main_ftp">{$lng['changepassword']['also_change_ftp']}</label>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="checkbox" name="change_webalizer" id="change_webalizer" value="true" />
								<label for="change_webalizer">{$lng['changepassword']['also_change_webalizer']}</label>
							</td>
						</tr>
						<tfoot>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" value="{$lng['menue']['main']['changepassword']}" />
								</td>
							</tr>
						</tfoot>
					</table>
				</fieldset>
			</form>
		</section>
	</article>
$footer
