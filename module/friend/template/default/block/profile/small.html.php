<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: small.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul class="profile_friend_list">
{foreach from=$aFriends key=iKey name=friend item=aFriend}
	<li>
		{img user=$aFriend suffix='_100_square' max_width=100 max_height=100}
		{$aFriend|user:'':'':40}
	</li>
{/foreach}
</ul>
<div class="clear"></div>

{foreach from=$aFriendLists item=aLists}
	<div class="title"><a href="{url link=''$aUser.user_name'.friend' list=$aLists.list_id}">{$aLists.name|clean} ({$aLists.friends_total})</a></div>
	<div class="content">
		<ul class="block_listing">
		{foreach from=$aLists.friends item=aList}
		<li>
			{img user=$aList suffix='_100_square' max_width=100 max_height=100}
			{$aList|user:'':'':'':12:true|shorten:40:'...'}
		</li>	
		{/foreach}
		</ul>
		<div class="clear"></div>
	</div>
{/foreach}