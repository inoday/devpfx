<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="profile_header">
	{if (!empty($aCoverPhoto.destination))}
	<div class="profile_header_cover">
		{img id='js_photo_cover_position' server_id=$aCoverPhoto.server_id path='photo.url_photo' file=$aCoverPhoto.destination suffix='_1024' style='position: relative; top:'$sLogoPosition'px;'}
	</div>
	{/if}
	{*
	<div id="section_menu">
	{if isset($bIsPagesViewSection)}		
		<ul>
			{foreach from=$aSubPageMenus item=aSubPageMenu}
			<li><a href="{$aSubPageMenu.url}">{$aSubPageMenu.phrase}</a></li>
			{/foreach}
		</ul>			
	{else}
		{if $aPage.is_app || !$aPage.is_admin}
		<ul>
			{if $aPage.is_app}
				<li><a href="{permalink module='apps' id=$aPage.app_id title=$aPage.title}">{phrase var='pages.go_to_app'}</a></li>
			{/if}
			{if !$aPage.is_admin}
				<li><a href="{url link='pages.add'}">{phrase var='pages.create_a_page'}</a></li>		
			{/if}	
		</ul>
		{/if}
	{/if}	
	</div>
	
	<h1><a href="{$aPage.link}" title="{$aPage.title|clean}">{$aPage.title|clean|split:50|shorten:40:'...'}</a>
	
	{template file='pages.block.joinpage'}
	</h1>
	<div class="profile_info">
		{$aPage.category_name|convert}
	</div>
	*}

	<div class="holder">

		<div class="profile_image">
			<div class="profile_image_holder">
				{if $aPage.is_app}
				{img server_id=$aPage.image_server_id path='app.url_image' file=$aPage.aApp.image_path suffix='_120_square' max_width='120' max_height='120' title=$aPage.aApp.app_title}
				{else}
				{if Phpfox::getParam('core.keep_non_square_images')}
				{img thickbox=true server_id=$aPage.image_server_id title=$aPage.title path='core.url_user' file=$aPage.image_path suffix='_120_square' max_width='120' max_height='120'}
				{else}
				{img thickbox=true server_id=$aPage.image_server_id title=$aPage.title path='core.url_user' file=$aPage.image_path suffix='_120_square' max_width='120' max_height='120'}
				{/if}
				{/if}
			</div>
		</div>

		<section class="profile_header_inner">
			<div class="pages_category">
				{$aPage.category_name|convert}
			</div>
			<h1><a href="{$aPage.link}" title="{$aPage.title|clean}">{$aPage.title|clean|split:50|shorten:40:'...'}</a></h1>
			{template file='pages.block.joinpage'}
		</section>
	</div>

	{if $bCanViewPage}
	{if (Phpfox::getLib('template')->getStyleFolder() == 'unity')}
	<div id="pages_menu_left" style="display:none;">{img theme="left-arrow.png"}</div>
	{/if}
	<div class="pages_main_menu">
		<div class="holder">
			<ul>
				{foreach from=$aPageLinks item=aPageLink}
				<li class="{if isset($aPageLink.is_selected)} active{/if}">
					<a href="{$aPageLink.url}" class="ajax_link">{$aPageLink.phrase}{if isset($aPageLink.total)}<span>({$aPageLink.total|number_format})</span>{/if}</a>
					{if isset($aPageLink.sub_menu) && is_array($aPageLink.sub_menu) && count($aPageLink.sub_menu)}
					<ul>
						{foreach from=$aPageLink.sub_menu item=aProfileLinkSub}
						<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aPageLink.url}{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
						{/foreach}
					</ul>
					{/if}
				</li>
				{/foreach}
			</ul>
		</div>
	</div>
	{if (Phpfox::getLib('template')->getStyleFolder() == 'unity')}
	<div id="pages_menu_right" style="display:none;">{img theme="right-arrow.png"}</div>
	{/if}
	{/if}

</div>

{if $bRefreshPhoto}
	{literal}
		<style type="text/css">
			#js_photo_cover_position
			{
				cursor:move;
			}
		</style>
		<script type="text/javascript">
		var sCoverPosition = '0';	
		$Behavior.positionCoverPhoto = function(){			
			$('#js_photo_cover_position').draggable('destroy').draggable({
				axis: 'y',
				cursor: 'move',	
				stop: function(event, ui){
					var sStop = $(this).position();
					sCoverPosition = sStop.top;
				}
			});	
		}
		</script>
	{/literal}
{/if}
{if $bRefreshPhoto}
	<div class="cover_photo_change">
		{phrase var='user.drag_to_reposition_cover'}
		<form method="post" action="#">
			<ul class="table_clear_button">
				<li id="js_cover_update_loader_upload" style="display:none;">{img theme='ajax/add.gif' class='v_middle'}</li>		
				<li class="js_cover_update_li"><div><input type="button" class="button button_off" value="{phrase var='user.cancel_cover_photo'}" name="cancel" onclick="window.location.href='{url link='profile'}';" /></div></li>
				<li class="js_cover_update_li"><div><input type="button" class="button" value="{phrase var='user.save_changes'}" name="save" onclick="$('.js_cover_update_li').hide(); $('#js_cover_update_loader_upload').show(); $.ajaxCall('pages.updateCoverPosition', 'position=' + sCoverPosition + '&page_id={$aPage.page_id}'); return false;" /></div></li>
			</ul>
			<div class="clear"></div>
		</form>
	</div>
{/if}
