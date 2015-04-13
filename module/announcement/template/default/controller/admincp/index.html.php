<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.announcement.add'}" id="admin_create_link">New Announcement</a>
</div>
<div id="admincp_search_content">
	{if count($aAnnouncements)}
	<div id="js_announcements">
		{module name='announcement.manage' sLanguage=$sDefaultLanguage}
	</div>
	{else}
	{phrase var='announcement.no_announcements_have_been_created'}
	{/if}
</div>