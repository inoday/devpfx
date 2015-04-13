<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.subscribe.add'}" id="admin_create_link">New Package</a>
</div>
<div id="admincp_search_content">
	{if count($aPackages)}
	<table id="js_drag_drop" cellpadding="0" cellspacing="0">
	<tr>
		<th style="width:20px;"></th>
		<th class="active_title"></th>
		<th>{phrase var='subscribe.title'}</th>
		<th>{phrase var='subscribe.subscriptions'}</th>
		<th class="action_title">{phrase var='subscribe.active'}</th>
	</tr>
	{foreach from=$aPackages key=iKey item=aPackage}
	<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
		<td class="drag_handle"><input type="hidden" name="val[ordering][{$aPackage.package_id}]" value="{$aPackage.ordering}" /></td>
		<td>
			<div class="js_item_is_active"{if !$aPackage.is_active} style="display:none;"{/if}>
			<a href="#?call=subscribe.updateActivity&amp;package_id={$aPackage.package_id}&amp;active=0" class="js_item_active_link" title="{phrase var='subscribe.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
</div>
<div class="js_item_is_not_active"{if $aPackage.is_active} style="display:none;"{/if}>
<a href="#?call=subscribe.updateActivity&amp;package_id={$aPackage.package_id}&amp;active=1" class="js_item_active_link" title="{phrase var='subscribe.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
</div>
</td>

		<td>{$aPackage.title|convert|clean}</td>
		<td>{if $aPackage.total_active > 0}<a href="{url link='admincp.subscribe.list' package=$aPackage.package_id status='completed'}">{/if}{$aPackage.total_active}{if $aPackage.total_active > 0}</a>{/if}</td>
		<td class="action_list">
			<a href="{url link='admincp.subscribe.add' id={$aPackage.package_id}">Edit</a>
			<a href="{url link='admincp.subscribe' delete={$aPackage.package_id}" onclick="return confirm('{phrase var='subscribe.are_you_sure' phpfox_squote=true}');" class="is_delete">Delete</a>
			{if $aPackage.total_active > 0}
			<a href="{url link='admincp.subscribe.list' package=$aPackage.package_id status='completed'}">{phrase var='subscribe.view_active_subscriptions'}</a>
			<a href="{url link='admincp.user.browse' group=$aPackage.user_group_id}">{phrase var='subscribe.view_active_users'}</a>
			{/if}
		</td>
	</tr>
	{/foreach}
	</table>
	{else}
	{phrase var='subscribe.no_packages_have_been_added'}
	{/if}
</div>