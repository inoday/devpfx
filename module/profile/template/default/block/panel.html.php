<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: panel.html.php 414 2009-04-17 23:31:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<section class="profile_panel_banner">
	{if (!empty($aCoverPhoto.destination))}
		{img id='js_photo_cover_position' server_id=$aCoverPhoto.server_id path='photo.url_photo' file=$aCoverPhoto.destination suffix='_1024' style='position: relative; top:'$sLogoPosition'px;'}
	{/if}
	<h1>
		<a href="{if isset($aUser.link) && !empty($aUser.link)}{url link=$aUser.link}{else}{url link=$aUser.user_name}{/if}" title="{$aUser.full_name|clean}">
			{$aUser.full_name|clean|split:30|shorten:50:'...'}
		</a>

		<div class="profile_panel_action">
			<ul>
				{if Phpfox::getUserId() == $aUser.user_id}

				{else}
				{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
				<li><a href="#" class="send_message js_hover_title" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;"><span class="js_hover_info">{phrase var='profile.send_message'}</span></a></li>
				{/if}
				{if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2 || true}
				<li id="js_add_friend_on_profile" class="js_hover_title{if !$aUser.is_friend && $aUser.is_friend_request === 3} js_profile_online_friend_request{/if}">
					<a href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}" class="add_to_friends">
						<span class="js_hover_info">{if !$aUser.is_friend && $aUser.is_friend_request === 3}{phrase var='profile.confirm_friend_request'}{else}{phrase var='profile.add_to_friends'}{/if}</span>
					</a>
				</li>
				{/if}
				{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
				<li id="liPoke">
					<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;" class="poke_user js_hover_title"><span class="js_hover_info">{phrase var='poke.poke' full_name=''}</span></a>
				</li>
				{/if}
				{plugin call='profile.template_block_menu_more'}
				{if Phpfox::getUserParam('core.can_gift_points')}
				<li>
					<a href="#?call=core.showGiftPoints&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_gift_points js_hover_title">
						<span class="js_hover_info">{phrase var='core.gift_points'}</span>
					</a>
				</li>
				{/if}
				{/if}
			</ul>
		</div>
	</h1>
</section>

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
				<li class="js_cover_update_li"><div><input type="button" class="button" value="{phrase var='user.save_changes'}" name="save" onclick="$('.js_cover_update_li').hide(); $('#js_cover_update_loader_upload').show(); $.ajaxCall('user.updateCoverPosition', 'position=' + sCoverPosition); return false;" /></div></li>
			</ul>
			<div class="clear"></div>
		</form>
	</div>
{/if}

{if Phpfox::getUserId() == $aUser.user_id}
<div class="item_bar">
	<div class="item_bar_action_holder">
		<ul>
			<li><a href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a></li>
			{if Phpfox::getUserParam('profile.can_change_cover_photo')}
			<li>
				<a href="#" id="js_change_cover_photo" onclick="$('#cover_section_menu_drop').toggle(); return false;">
					{if empty($aUser.cover_photo)}{phrase var='user.add_a_cover'}{else}{phrase var='user.change_cover'}{/if}
				</a>
				{if Phpfox::getUserParam('profile.can_change_cover_photo')}
				<div id="cover_section_menu_drop" style="display:none;">
					<ul>
						<li><a href="{url link='profile.photo'}">{phrase var='user.choose_from_photos'}</a></li>
						<li><a href="#" onclick="$('#cover_section_menu_drop').hide(); $Core.box('profile.logo', 500); return false;">{phrase var='user.upload_photo'}</a></li>
						{if !empty($aUser.cover_photo)}
						<li><a href="{url link='profile' coverupdate='1'}">{phrase var='user.reposition'}</a></li>
						<li><a href="#" onclick="$('#cover_section_menu_drop').hide(); $.ajaxCall('user.removeLogo'); return false;">{phrase var='user.remove'}</a></li>
						{/if}
					</ul>
				</div>
				{/if}
			</li>
			{/if}
		</ul>
	</div>
</div>
{/if}

<div class="profile_panel">
	{$sProfileImage}

	<ul class="profile_panel_menu">
		{foreach from=$aProfileLinks item=aProfileLink}
		<li class="{if isset($aProfileLink.is_selected)} active{/if}">
			<a href="{url link=$aProfileLink.url}" class="ajax_link">{$aProfileLink.phrase}</a>
			{if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
			{/if}
		</li>
		{/foreach}
	</ul>
</div>
