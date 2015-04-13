<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: note.html.php 2826 2011-08-11 19:41:03Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="js_admincp_note_holder">
	<div style="position:absolute; right:0; margin-right:20px; margin-top:2px; display:none;" id="js_save_note">
		{img theme='ajax/small.gif'}
	</div>
	<textarea id="js_admincp_note" name="admincp_note" cols="60" rows="8" onblur="$('#js_share_user_status').hide(); $('#js_save_note').show(); $('#js_admincp_note').ajaxCall('core.admincp.updateNote');" placeholder="Save your notes here...">{$sAdminNote}</textarea>
</div>