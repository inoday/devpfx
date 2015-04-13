<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Display the image details when viewing an image.
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel Espinoza
 * @package  		Module_<INSERT MODULE NAME HERE>
 * @version 		$Id: manage.html.php 1821 2010-09-20 16:11:48Z Miguel_Espinoza $
 */

?>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th class="active_title"></th>
		<th>{phrase var='announcement.subject'}</th>
		<th class="action_title">Actions</th>
	</tr>
	{foreach from=$aAnnouncements key=iKey item=aAnnouncement}
	<tr class="{if is_int($iKey/2)} tr{else}{/if}">
		<td>
			<div class="js_item_is_active"{if !$aAnnouncement.is_active} style="display:none;"{/if}>
			<a href="#?call=announcement.setActive&amp;id={$aAnnouncement.announcement_id}&amp;active=0" class="js_item_active_link" title="{phrase var='admincp.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
			</div>
			<div class="js_item_is_not_active"{if $aAnnouncement.is_active} style="display:none;"{/if}>
			<a href="#?call=announcement.setActive&amp;id={$aAnnouncement.announcement_id}&amp;active=1" class="js_item_active_link" title="{phrase var='admincp.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
			</div>
		</td>
		<td>{phrase var=$aAnnouncement.subject_var}</td>
		<td class="action_list">
			<a href="{url link='admincp.announcement.add' id=$aAnnouncement.announcement_id}">{phrase var='announcement.edit'}</a>
			<a href="{url link='admincp.announcement' delete=$aAnnouncement.announcement_id}" onclick="return confirm('{phrase var='announcement.are_you_sure'}');" class="is_delete">{phrase var='announcement.delete'}</a>
		</td>
	</tr>
	{/foreach}
</table>
