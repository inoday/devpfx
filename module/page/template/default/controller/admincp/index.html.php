<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Page
 * @version 		$Id: index.html.php 1194 2009-10-18 12:43:38Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.page.add'}" id="admin_create_link">Create New Page</a>
</div>

<div id="admincp_search_content">
	{if count($aPages)}
	<form method="post" action="{url link='admincp.page'}">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Name</th>
			<th>{phrase var='page.created'}</th>
			<th>{phrase var='page.active'}</th>
			<th class="action_title">{phrase var='page.actions'}</th>
		</tr>
		{foreach from=$aPages key=iKey item=aPage}
		<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
			<td><a href="{url link=$aPage.title_url}" class="targetBlank">{if $aPage.is_phrase}{phrase var=$aPage.title}{else}{$aPage.title}{/if}</a></td>
			<td>{$aPage.added|date:'core.global_update_time'}</td>
			<td>
				<div><input type="hidden" name="val[{$aPage.page_id}][title_url]" value="{$aPage.title_url}" /></div>
				<div><input type="checkbox" name="val[{$aPage.page_id}][is_active]" value="1" {if $aPage.is_active}checked="checked" {/if}/></div>
			</td>
			<td class="action_list">
					<a href="{url link='admincp.page.add.' id=$aPage.page_id}">Edit</a>
					{if $aPage.menu_id}
					<a href="{url link='admincp.menu.add.' id=$aPage.menu_id}">{phrase var='page.edit_page_menu'}</a>
					{/if}
					<a href="{url link='admincp.page.' delete=$aPage.page_id}" class="is_delete">{phrase var='page.delete'}</a>
			</td>
		</tr>
		{/foreach}
		</table>
		<div class="table_bottom">
			<input type="submit" value="{phrase var='admincp.update'}" class="button" />
		</div>
	</form>
	{else}
	{phrase var='page.no_pages_have_been_added'}
	{/if}
</div>