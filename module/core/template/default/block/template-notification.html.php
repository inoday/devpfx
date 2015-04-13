<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-notification.html.php 2838 2011-08-16 19:09:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul class="panel_links">
	<li><a href="#" rel="user.panel" title="Settings" class="user_settings notify_drop_link"><span class="icon"></span><span class="phrase">Settings</span></a></li>
	<li><a href="#" rel="search" title="Search" class="search notify_drop_link"><span class="icon"></span><span class="phrase">Search</span></a></li>
	{if Phpfox::getUserBy('profile_page_id') <= 0}
	{if Phpfox::isModule('friend')}
	{module name='friend.notify'}
	{/if}
	{if Phpfox::isModule('mail')}
	{module name='mail.notify'}
	{/if}
	{/if}
	{if Phpfox::isModule('notification')}
	{module name='notification.notify'}
	{/if}
	{if (Phpfox::isModule('shoutbox'))}
	<li><a href="#" rel="shoutbox.panel" title="Shoutbox" class="shoutbox notify_drop_link"><span class="icon"></span><span class="phrase">Shoutbox</span></a></li>
	{/if}
</ul>