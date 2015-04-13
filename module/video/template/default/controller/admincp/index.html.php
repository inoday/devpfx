<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 405 2009-04-15 13:10:28Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<a href="{url link='admincp.video.add'}" id="admin_create_link">New Category</a>
</div>

<div id="admincp_search_content">
	<div id="js_menu_drop_down" style="display:none;">
		<div class="link_menu dropContent" style="display:block;">
			<ul>
				<li><a href="#" onclick="return $Core.video.action(this, 'edit');">{phrase var='video.edit'}</a></li>
				<li><a href="#" onclick="return $Core.video.action(this, 'delete');">{phrase var='video.delete'}</a></li>
			</ul>
		</div>
	</div>
	<div class="table_header">
		Categories
	</div>
	<form method="post" action="{url link='admincp.video'}">
		<div class="table">
			<div class="sortable">
				{$sCategories}
			</div>
		</div>
		<div class="table_clear">
			<input type="submit" value="{phrase var='video.update_order'}" class="button" />
		</div>
	</form>
</div>