<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !$bIsSearch && $aPermissions.can_view_thread_content.value == 1}
	{if $aCallback === null}
		{if !$aForumData.is_closed && Phpfox::getUserParam('forum.can_add_new_thread') || Phpfox::getService('forum.moderate')->hasAccess('' . $aForumData.forum_id . '', 'add_thread')}
			<div id="section_menu"><ul><li><a href="{url link='forum.post.thread' id=$aForumData.forum_id}">{phrase var='forum.new_thread'}</a></li></ul></div>
		{/if}
	{else}
<div id="section_menu"><ul><li><a href="{url link='forum.post.thread' module=$aCallback.module_id item=$aCallback.item_id}">{phrase var='forum.new_thread'}</a></li></ul></div>
	{/if}	
{/if}
{if count($aThreads)}
{if !$bIsSearch}

{*
<div class="forum_header_menu">
	<ul class="sub_menu_bar">	
		{if Phpfox::isUser()}
		<li class="sub_menu_bar_li"><a href="#" class="sJsDropMenu drop_down_link">{phrase var='forum.forum_tools'}</a>
			<div class="link_menu dropContent">
				<ul>
				{if $aCallback === null}
					<li><a href="{url link='forum.read' forum=$aForumData.forum_id}">{phrase var='forum.mark_this_forum_read'}</a></li>
				{else}
					<li><a href="{url link='forum.read' module=$aCallback.module_id item=$aCallback.item_id}">{phrase var='forum.mark_this_forum_read'}</a></li>
				{/if}
				</ul>
			</div>		
		</li>
		{/if}
		<li class="sub_menu_bar_li"><a href="#" class="sJsDropMenu drop_down_link">{phrase var='forum.search_this_forum'}</a>
			<div class="link_menu dropContent">
				<form method="post" action="{if $aCallback !== null}{url link='forum.search' module=$aCallback.module_id item=$aCallback.item_id}{else}{url link='forum.search'}{/if}">
				{if $aCallback === null}
				<div><input type="hidden" name="search[forum][]" value="{$aForumData.forum_id}" /></div>
				{else}
				<div><input type="hidden" name="search[item_id]" value="{$aCallback.item_id}" /></div>
				{/if}
					<div class="div_menu">
						<input type="text" name="search[keyword]" value="" class="v_middle" /> <input name="search[submit]" type="submit" value="Go" class="button v_middle" />
					</div>
					<div class="div_menu">
						<label><input type="radio" name="search[result]" value="0" class="v_middle checkbox" checked="checked" /> {phrase var='forum.show_threads'}</label>
						<label><input type="radio" name="search[result]" value="1" class="v_middle checkbox" /> {phrase var='forum.show_posts'}</label>
					</div>
				</form>
				<ul>
					{if $aCallback === null}				
					<li><a href="{url link='forum.search' id=$aForumData.forum_id}">{phrase var='forum.advanced_search'}</a></li>
					{else}
					<li><a href="{url link='forum.search' module=$aCallback.module_id item=$aCallback.item_id}">{phrase var='forum.advanced_search'}</a></li>
					{/if}
				</ul>
			</div>
		</li>		
		<li class="sub_menu_bar_li">
			<a href="{if $aCallback === null}{url link='forum.rss' forum=$aForumData.forum_id}{else}{url link='forum.rss' pages=$aCallback.item_id}{/if}" title="{phrase var='forum.subscribe_to_this_forum'}" class="no_ajax_link">
				{img theme='rss/tiny.png' class='v_middle'}
			</a>
		</li>
	</ul>
	<div class="clear"></div>
</div>
*}

{/if}

{/if}

{if $aCallback === null && !$bIsSearch}
{template file='forum.block.entry'}
{/if}

{if !$bIsSearch && count($aAnnouncements)}
<div class="table_info">
	{phrase var='forum.announcements'}
</div>
{foreach from=$aAnnouncements item=aThread}
	{template file='forum.block.thread-entry'}
{/foreach}
{/if}

{if count($aThreads)}

{if isset($bResult) && $bResult}

<div class="table_info">
	{phrase var='forum.posts'}
</div>

{foreach from=$aThreads item=aPost}
	{template file='forum.block.post'}
{/foreach}

{else}

<div class="forum_thread_holder">
	{foreach from=$aThreads item=aThread}
		{template file='forum.block.thread-entry'}
	{/foreach}
</div>

{/if}

{if !isset($bIsPostSearch) && (Phpfox::getUserParam('forum.can_approve_forum_thread') || Phpfox::getUserParam('forum.can_delete_other_posts'))}
{moderation}
{/if}
{pager}


{else}
<div class="extra_info">
{if $bIsSearch}
	{phrase var='forum.nothing_found'}
{else}
	{phrase var='forum.no_threads_found'}
{/if}
	<br />
	<br />
</div>
{/if}

{if $aCallback === null}
{module name='forum.jump'}
{/if}