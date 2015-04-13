<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: entry.html.php 1300 2009-12-07 00:39:10Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?><tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
	<td class="is_sortable_icon" data-sort-id="{$aMenu.menu_id}"></td>
	<td>
		<div class="js_item_is_active"{if !$aMenu.is_active} style="display:none;"{/if}>
		<a href="#?call=admincp.updateMenuActive&amp;id={$aMenu.menu_id}&amp;active=0" class="js_item_active_link" title="Enable">{img theme='misc/bullet_green.png' alt=''}</a>
		</div>
		<div class="js_item_is_not_active"{if $aMenu.is_active} style="display:none;"{/if}>
		<a href="#?call=admincp.updateMenuActive&amp;id={$aMenu.menu_id}&amp;active=1" class="js_item_active_link" title="Disable">{img theme='misc/bullet_red.png' alt=''}</a>
		</div>
	</td>
	<td>{$aMenu.name}</td>
	<td>{$aMenu.url_value}</td>
	<td class="action_list">
			<a href="{url link='admincp.menu.add.' id=$aMenu.menu_id}">{phrase var='admincp.edit'}</a>
			{if $aMenu.total_children > 0}
			<a href="{url link='admincp.menu' parent=$aMenu.menu_id}">{phrase var='admincp.manage_children_total_children' total_children=$aMenu.total_children}</a>
			{/if}
			<a href="{url link='admincp.menu.' delete=$aMenu.menu_id}" class="is_delete">{phrase var='admincp.delete'}</a>
	</td>
</tr>