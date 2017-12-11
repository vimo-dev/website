$header
	<article>
		<header>
			<h2>
				<img src="templates/{$theme}/assets/img/icons/ticket_archive_big.png" alt="" />&nbsp;
				{$lng['ticket']['ticket_delete']}
			</h2>
		</header>

		<section>
			<if 0 < $ticket_replies_count >
			$ticket_replies
			</if>
			<p><a href="{$linker->getLink(array('section' => 'tickets', 'page' => 'archive', 'action' => 'delete', 'id' => $id))}"><img src="templates/{$theme}/assets/img/icons/delete.png" alt="" />&nbsp;{$lng['panel']['delete']}</a></p>
		</section>
	</article>
$footer
