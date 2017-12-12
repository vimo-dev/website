$header
<article>
	<header>
		<h2>
			<img src="templates/{$theme}/assets/img/icons/domain_edit_big.png" alt="{$title}" />&nbsp;
			{$title}
			<if $result['isbinddomain'] == '1' && $userinfo['dnsenabled'] == '1' && Settings::Get('system.bind_enable') == '1' && Settings::Get('system.dnsenabled') == '1'>
				&nbsp;(<small><a href="{$linker->getLink(array('section' => 'domains', 'page' => 'domaindnseditor', 'domain_id' => $id))}">{$lng['dnseditor']['edit']}</a></small>)
			</if>
		</h2>
	</header>

	<section>

		<form action="{$linker->getLink(array('section' => 'domains'))}" method="post" enctype="application/x-www-form-urlencoded">
			<input type="hidden" name="s" value="$s" />
			<input type="hidden" name="page" value="$page" />
			<input type="hidden" name="action" value="$action" />
			<input type="hidden" name="id" value="$id" />
			<input type="hidden" name="send" value="send" />

			<table class="full">
				  {$subdomain_edit_form}
			</table>
		</form>
	</section>
</article>
$footer
