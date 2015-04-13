<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 3332 2011-10-20 12:50:29Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.pages.add'}" id="admin_create_link">New Category</a>
</div>
<div id="admincp_search_content">
	<div class="table_header">
		{phrase var='pages.categories'}
	</div>
	<table id="js_drag_drop" cellpadding="0" cellspacing="0">
		<tr>
			<th style="width:20px;"></th>
			<th class="active_title"></th>
			<th>{phrase var='pages.name'}</th>
			<th class="action_title">Actions</th>
		</tr>
		{foreach from=$aCategories key=iKey item=aCategory}
		<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
			<td class="drag_handle"><input type="hidden" name="val[ordering][{if $bSubCategory}{$aCategory.category_id}{else}{$aCategory.type_id}{/if}]" value="{$aCategory.ordering}" /></td>
			<td>
				<div class="js_item_is_active"{if !$aCategory.is_active} style="display:none;"{/if}>
				<a href="#?call=pages.updateActivity&amp;id={if $bSubCategory}{$aCategory.category_id}{else}{$aCategory.type_id}{/if}&amp;active=0&amp;sub={if $bSubCategory}1{else}0{/if}" class="js_item_active_link" title="{phrase var='pages.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
				</div>
				<div class="js_item_is_not_active"{if $aCategory.is_active} style="display:none;"{/if}>
				<a href="#?call=pages.updateActivity&amp;id={if $bSubCategory}{$aCategory.category_id}{else}{$aCategory.type_id}{/if}&amp;active=1&amp;sub={if $bSubCategory}1{else}0{/if}" class="js_item_active_link" title="{phrase var='pages.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
				</div>
			</td>
			<td>{$aCategory.name|convert}</td>
			<td class="action_list">
				<a href="{if $bSubCategory}{url link='admincp.pages.add' sub=$aCategory.category_id}{else}{url link='admincp.pages.add' id=$aCategory.type_id}{/if}">{phrase var='pages.edit'}</a>
				{if isset($aCategory.categories) && ($iTotalSub = count($aCategory.categories))}
				<a href="{url link='admincp.pages' sub={$aCategory.type_id}">{phrase var='pages.manage_sub_categories_total' total=$iTotalSub}</a>
				{/if}
				<a href="{if $bSubCategory}{url link='admincp.pages' sub=$aCategory.type_id delete=$aCategory.category_id}{else}{url link='admincp.pages' delete=$aCategory.type_id}{/if}" onclick="return confirm('{phrase var='pages.are_you_sure'}');" class="is_delete">{phrase var='pages.delete'}</a>
			</td>
		</tr>
		{/foreach}
	</table>
</div>