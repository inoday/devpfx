<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1298 2009-12-05 16:19:23Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.attachment.add'}" id="admin_create_link">New Extension</a>
</div>
<div id="admincp_search_content">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th class="active_title"></th>
			<th>{phrase var='announcement.extension'}</th>
			<th>{phrase var='attachment.mime_type'}</th>
			<th>{phrase var='attachment.image'}</th>
			<th class="action_title">Actions</th>
		</tr>
	{foreach from=$aRows key=iKey item=aRow}
		<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
			<td>
				<div class="js_item_is_active"{if !$aRow.is_active} style="display:none;"{/if}>
					<a href="#?call=attachment.updateActivity&amp;id={$aRow.extension}&amp;active=0" class="js_item_active_link" title="{phrase var='admincp.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
				</div>
				<div class="js_item_is_not_active"{if $aRow.is_active} style="display:none;"{/if}>
					<a href="#?call=attachment.updateActivity&amp;id={$aRow.extension}&amp;active=1" class="js_item_active_link" title="{phrase var='admincp.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
				</div>
			</td>
			<td>{$aRow.extension}</td>
			<td>{$aRow.mime_type}</td>
			<td>{if $aRow.is_image}{phrase var='admincp.yes'}{else}{phrase var='admincp.no'}{/if}</td>
			<td class="action_list">
				<a href="{url link='admincp.attachment.add' id=$aRow.extension}">{phrase var='admincp.edit'}</a>
				<a href="{url link='admincp.attachment' delete=$aRow.extension}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='admincp.delete'}</a>
			</td>
		</tr>
	{/foreach}
	</table>
</div>