<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: view.html.php 6489 2013-08-22 08:55:19Z Fern $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>

{if !$bIsTheater}
<div id="view_photo_click_image_holder"></div>
<a rel="{$aForms.photo_id}" class="thickbox photo_holder_image view_photo_click_image" href="{$sCurrentPhotoUrl}"></a>
{else}
<div id="js_current_page_url" style="display:none;">{if $iForceAlbumId > 0}albumid_{$iForceAlbumId}{else}{if isset($feedUserId)}userid_{$feedUserId}/{/if}{/if}</div>

{if isset($aForms.view_id) && $aForms.view_id == 1}
<div class="message js_moderation_off">
	{phrase var='photo.image_is_pending_approval'}
</div>
{/if}

<div id="photo_view_theater_mode" class="photo_view_box_holder">

	<div class="photo_view_box_image photo_holder_image" {if isset($aPhotoStream.next.photo_id)}onclick="tb_show('', '{$aPhotoStream.next.link}{if $iForceAlbumId > 0}albumid_{$iForceAlbumId}{else}{if isset($feedUserId)}userid_{$feedUserId}/{/if}{/if}', this);" rel="{$aPhotoStream.next.photo_id}"{/if}>		
		 <div id="photo_view_tag_photo">
			<a href="#" id="js_tag_photo">{phrase var='photo.tag_this_photo'}</a>
		</div>
		<div id="photo_view_ajax_loader">{img theme='ajax/loader.gif'}</div>
			{if $aPhotoStream.total > 1}
			<div class="photo_next_previous">
				<ul>
				{if isset($aPhotoStream.previous.photo_id)}
				<li class="previous"><a href="{$aPhotoStream.previous.link}{if $iForceAlbumId > 0}albumid_{$iForceAlbumId}{else}{if isset($feedUserId)}userid_{$feedUserId}/{/if}{/if}"{if $bIsTheater} class="thickbox photo_holder_image" rel="{$aPhotoStream.previous.photo_id}"{/if}>{phrase var='photo.previous'}</a></li>
				{/if}	

				{if isset($aPhotoStream.next.photo_id)}
				<li class="next"><a href="{$aPhotoStream.next.link}{if $iForceAlbumId > 0}albumid_{$iForceAlbumId}{else}{if isset($feedUserId)}userid_{$feedUserId}/{/if}{/if}"{if $bIsTheater} class="thickbox photo_holder_image" rel="{$aPhotoStream.next.photo_id}"{/if}>{phrase var='photo.next'}</a></li>
				{/if}
				</ul>
				<div class="clear"></div>
			</div>
			{/if}				
		
			<div class="photo_view_box_image_holder">
				{if isset($aPhotoStream.next.photo_id)}
				<a href="{$aPhotoStream.next.link}{if $iForceAlbumId > 0}albumid_{$iForceAlbumId}{else}{if isset($feedUserId)}userid_{$feedUserId}/{/if}{/if}"{if $bIsTheater} class="thickbox photo_holder_image" rel="{$aPhotoStream.next.photo_id}"{/if}>
				{/if}
					{if $aForms.user_id == Phpfox::getUserId()}
						{img id='js_photo_view_image' server_id=$aForms.server_id path='photo.url_photo' file=$aForms.destination suffix='_1024' max_width=1024 max_height=1024 title=$aForms.title time_stamp=true onmouseover="$('.photo_next_previous .next a').addClass('is_hover_active');" onmouseout="$('.photo_next_previous .next a').removeClass('is_hover_active');"}
                    {else}
						{img id='js_photo_view_image' server_id=$aForms.server_id path='photo.url_photo' file=$aForms.destination suffix='_1024' max_width=1024 max_height=1024 title=$aForms.title onmouseover="$('.photo_next_previous .next a').addClass('is_hover_active');" onmouseout="$('.photo_next_previous .next a').removeClass('is_hover_active');"}
					{/if}
				{if isset($aPhotoStream.next.photo_id)}
				</a>
				{/if}			
			</div>
		</div>

		<div class="photo_box_content">
			<div class="photo_view_in_photo">
				<b>{phrase var='photo.in_this_photo'}:</b> <span id="js_photo_in_this_photo"></span>
			</div>

			<div class="photo_view_box_comment">
				{plugin call='photo.template_controller_view_view_box_comment_1'}
				<div class="photo_view_box_comment_padding">
					{plugin call='photo.template_controller_view_view_box_comment_2'}
					<div id="js_photo_view_box_title">
						{plugin call='photo.template_controller_view_view_box_comment_3'}
						<div class="row_title">
							<div class="row_title_image">
								<a href="{url link=$aForms.user_name}" class="no_ajax_link">{img user=$aForms suffix='_50_square' max_width=50 max_height=50 no_link=true}</a>
							</div>
							<div class="row_title_info" style="position:relative;">
								<div class="photo_view_box_user"><a href="{url link=$aForms.user_name}" class="no_ajax_link">{$aForms.full_name|shorten:50}</a></div>
								<ul class="extra_info_middot">
									<li>{$aForms.time_stamp|convert_time}</li>
									{if !empty($aForms.album_id)}
									<li>&middot;</li>
									<li>{phrase var='photo.in'} <a href="{$aForms.album_url}">{$aForms.album_title|clean|split:45|shorten:75:'...'}</a> </li>
									{/if}
								</ul>
							</div>
						</div>

						{if (Phpfox::getUserParam('photo.can_edit_own_photo') && $aForms.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_edit_other_photo')
						|| (Phpfox::getUserParam('photo.can_delete_own_photo') && $aForms.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_delete_other_photos')
						}
						<div class="item_bar">
							<div class="item_bar_action_holder">
								{if $aForms.view_id == '1' && Phpfox::getUserParam('photo.can_approve_photos')}
								<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>
								<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('photo.approve', 'inline=true&amp;id={$aForms.photo_id}'); return false;">{phrase var='photo.approve'}</a>
								{/if}
								<a href="#" class="item_bar_action"><span>{phrase var='photo.actions'}</span></a>
								<ul>
									{module name='photo.menu'}
								</ul>
							</div>
						</div>
						{/if}

						{if $aForms.description}
						<div id="js_photo_description_{$aForms.photo_id}" class="extra_info" itemprop="description">
							{$aForms.description|parse|shorten:200:'photo.read_more':true}
						</div>
						{/if}
					</div>

					{if Phpfox::isModule('tag') && isset($aForms.tag_list)}
					{module name='tag.item' sType='photo' sTags=$aForms.tag_list iItemId=$aForms.photo_id iUserId=$aForms.user_id}
					{/if}

					{plugin call='photo.template_default_controller_view_extra_info'}

					<div id="js_photo_view_comment_holder" {if $aForms.view_id != 0}style="display:none;" class="js_moderation_on"{/if}>
					{module name='feed.comment'}
				</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
function customPhotoTagImage(){l}
	$Core.photo_tag.init({l}{$sPhotoJsContent}{r});
{r}
</script>
{/if}