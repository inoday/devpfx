<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 3990 2012-03-09 15:28:08Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aPages)}
{if $sView == 'my' && Phpfox::getUserBy('profile_page_id')}
<div class="message">
	{phrase var='pages.note_that_pages_displayed_here_are_pages_created_by_the_page' global_full_name=$sGlobalUserFullName|clean profile_full_name=$aGlobalProfilePageLogin.full_name|clean}
</div>
{/if}
{foreach from=$aPages name=pages item=aPage}
<div id="js_pages_{$aPage.page_id}" class="pages_browse">
	<a href="{$aPage.link}" class="pages_browse_image">{img server_id=$aPage.profile_server_id title=$aPage.title path='core.url_user' file=$aPage.profile_user_image suffix='_120_square' max_width='120' max_height='120' is_page_image=true}</a>
	<div class="pages_browse_link">
		<a href="{$aPage.link}" class="pbl_main">{$aPage.title|clean|shorten:55:'...'|split:40}</a>
		{if $aPage.total_like > 1}{phrase var='pages.total_members' total=$aPage.total_like|number_format}{elseif $aPage.total_like == 1}{phrase var='pages.1_member'}{else}{phrase var='pages.no_members'}{/if}
	</div>
	{template file='pages.block.joinpage'}
</div>
{/foreach}
{if Phpfox::getUserParam('pages.can_moderate_pages')}
{moderation}
{/if}

{pager}
{else}
<div class="extra_info">
	{phrase var='pages.no_pages_found'}
</div>
{/if}