<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: index.html.php 2826 2011-08-11 19:41:03Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.user.group.add'}" id="admin_create_link">Create User Group</a>
</div>
<div id="admincp_search_content">
	<table>
	<tr>
		<th>{phrase var='user.title'}</th>
		<th>{phrase var='user.users'}</th>
		<th class="action_title">Actions</th>
	</tr>
	{foreach from=$aGroups.all key=iKey item=aGroup}
	<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
		<td>{$aGroup.title|convert|clean}</td>
		<td>{if $aGroup.user_group_id == 3}N/A{else}{$aGroup.total_users}{/if}</td>
		<td class="action_list">
			{if Phpfox::getUserParam('user.can_edit_user_group')}
			<a href="{url link='admincp.user.group.add' id=$aGroup.user_group_id}">Edit</a>
			{/if}
			<a href="{url link='admincp.user.group.activitypoints' id=$aGroup.user_group_id}">Activity Points</a>
		</td>
	</tr>
	{/foreach}
	</table>
</div>