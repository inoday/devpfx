<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 6443 2013-08-12 12:04:03Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">

	<form method="post" action="{url link='admincp.ad'}">
		<div class="table_header">
			{phrase var='ad.ad_filter'}
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.type'}:
			</div>
			<div class="table_right">
				{$aFilters.status}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.display'}:
			</div>
			<div class="table_right">
				{$aFilters.display}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.sort_by'}:
			</div>
			<div class="table_right">
				{$aFilters.sort} {$aFilters.sort_by}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table_clear">
			<input type="submit" name="search[submit]" value="{phrase var='core.submit'}" class="button" />
			<input type="submit" name="search[reset]" value="{phrase var='core.reset'}" class="button" />
		</div>
	</form>
</div>

<div id="admincp_search_content">
	{if $iPendingCount > 0 && $sView != 'pending'}
	<div class="message">
		{phrase var='ad.there_are_pending_ads_that_require_your_attention_view_all_pending_ads_a_href_link_here_a' link=$sPendingLink}
	</div>
	{/if}
	{if count($aAds)}
	<form method="post" action="{url link='admincp.ad'}">
		<table>
		<tr>
			<th class="active_title"></th>
			<th style="width:30px;">{phrase var='ad.id'}</th>
			<th>{phrase var='ad.name'}</th>
			<th>{phrase var='ad.status'}</th>
			<th>{phrase var='ad.views'}</th>
			<th>{phrase var='ad.clicks'}</th>
			<th class="action_title">Actions</th>
		</tr>
		{foreach from=$aAds key=iKey item=aAd}
		<tr class="{if is_int($iKey/2)} tr{else}{/if}{if $aAd.is_custom && $aAd.is_custom == '2'} is_checked{/if}">
			<td>
				{if $aAd.is_custom == '2' || $aAd.is_custom == '1'}
				{phrase var='ad.n_a'}
				{else}
				<div class="js_item_is_active"{if !$aAd.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdActivity&amp;id={$aAd.ad_id}&amp;active=0" class="js_item_active_link" title="{phrase var='rss.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
				</div>
				<div class="js_item_is_not_active"{if $aAd.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdActivity&amp;id={$aAd.ad_id}&amp;active=1" class="js_item_active_link" title="{phrase var='rss.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
				</div>
				{/if}
			</td>
			<td><a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{$aAd.ad_id}</a></td>
			<td>{$aAd.name|clean|convert}</td>
			<td>{$aAd.status}</td>
			<td>{if $aAd.is_custom == '2' || $aAd.is_custom == '1'}N/A{else}{$aAd.count_view}{/if}</td>
			<td>{if $aAd.is_custom == '2' || $aAd.is_custom == '1' || $aAd.type_id == '2'}N/A{else}{$aAd.count_click}{/if}</td>
			<td class="action_list">
				{if $aAd.is_custom == '2'}
				<a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{phrase var='ad.view_edit'}</a>
				<a href="{url link='admincp.ad' approve=$aAd.ad_id}">{phrase var='ad.approve'}</a>
				<a href="{url link='admincp.ad' deny=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');">{phrase var='ad.deny'}</a>
				<a href="{url link='admincp.ad' delete=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='ad.delete'}</a>
				{else}
				<a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{phrase var='ad.edit'}</a>
				<a href="{url link='admincp.ad' delete=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='ad.delete'}</a>
				{/if}
			</td>

		</tr>
		{/foreach}
		</table>
		<div class="table_clear"></div>
	</form>
	{else}
	{if $bIsSearch}
		{phrase var='ad.no_search_results_were_found'}
	{else}
		{phrase var='ad.no_ads_have_been_created'}
	{/if}
	{/if}

	{pager}
</div>