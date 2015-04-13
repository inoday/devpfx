<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1651 2010-06-15 13:36:12Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.ad.placement.add'}" id="admin_create_link">New Placement</a>
</div>
<div id="admincp_search_content">
	{if count($aPlacements)}
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th class="active_title"></th>
			<th>{phrase var='ad.title'}</th>
			<th>{phrase var='ad.campaigns'}</th>
			<th class="action_title">Actions</th>
		</tr>
	{foreach from=$aPlacements key=iKey item=aPlacement}
		<tr class="{if is_int($iKey/2)} tr{else}{/if}">
			<td>
				<div class="js_item_is_active"{if !$aPlacement.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdPlacementActivity&amp;id={$aPlacement.plan_id}&amp;active=0" class="js_item_active_link" title="{phrase var='admincp.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
				</div>
				<div class="js_item_is_not_active"{if $aPlacement.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdPlacementActivity&amp;id={$aPlacement.plan_id}&amp;active=1" class="js_item_active_link" title="{phrase var='admincp.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
				</div>
			</td>
			<td>{$aPlacement.title|clean}</td>
			<td>{if $aPlacement.total_campaigns > 0}<a href="{url link='admincp.ad' location=$aPlacement.block_id}">{/if}{$aPlacement.total_campaigns}{if $aPlacement.total_campaigns > 0}</a>{/if}</td>
			<td class="action_list">
				<a href="{url link='admincp.ad.placement.add' id=$aPlacement.plan_id}">{phrase var='ad.edit'}</a>
				<a href="{url link='admincp.ad.placement' delete=$aPlacement.plan_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='ad.delete'}</a>
			</td>
		</tr>
	{/foreach}
	</table>
	{else}
	{phrase var='ad.no_placements_found'}
	{/if}
</div>