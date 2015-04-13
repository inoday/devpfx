<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1601 2010-05-30 05:20:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.user.promotion.add'}" id="admin_create_link">Create Promotion</a>
</div>
<div id="admincp_search_content">
	{if count($aPromotions)}
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>{phrase var='user.user_group'}</th>
			<th>{phrase var='user.upgraded_user_group'}</th>
			<th>{phrase var='user.total_activity'}</th>
			<th>{phrase var='user.total_days_registered'}</th>
			<th>Created On</th>
			<th class="action_title"></th>
		</tr>
		{foreach from=$aPromotions name=promotions item=aPromotion}
		<tr{if is_int($phpfox.iteration.promotions/2)} class="tr"{/if}>
			<td>{$aPromotion.user_group_title|convert}</td>
			<td>{$aPromotion.upgrade_user_group_title|convert}</td>
			<td>{$aPromotion.total_activity}</td>
			<td>{$aPromotion.total_day}</td>
			<td>{$aPromotion.time_stamp|date}</td>
			<td class="action_list">
				<a href="{url link='admincp.user.promotion.add' id=$aPromotion.promotion_id}">{phrase var='user.edit'}</a>
				<a href="{url link='admincp.user.promotion' delete=$aPromotion.promotion_id}" onclick="return confirm('{phrase var='core.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='user.delete'}</a>
			</td>
		</tr>
		{/foreach}
	</table>
	{else}
	<div class="message">
		{phrase var='user.no_promotions_found'}
	</div>
	{/if}
</div>