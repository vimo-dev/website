<tr>
	<td>{$language}</td>
	<td>{$template}</td>
	<td>
		<a href="{$linker->getLink(array('section' => 'templates', 'page' => $page, 'action' => 'edit', 'subjectid' => $subjectid, 'mailbodyid' => $mailbodyid))}">
			<img src="templates/{$theme}/assets/img/icons/edit.png" alt="{$lng['panel']['edit']}" title="{$lng['panel']['edit']}" />
		</a>&nbsp;
		<a href="{$linker->getLink(array('section' => 'templates', 'page' => $page, 'action' => 'delete', 'subjectid' => $subjectid, 'mailbodyid' => $mailbodyid))}">
			<img src="templates/{$theme}/assets/img/icons/delete.png" alt="{$lng['panel']['delete']}" title="{$lng['panel']['delete']}" />
		</a>
	</td>
</tr>
