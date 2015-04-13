<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Shoutbox
 * @version 		$Id: entry.html.php 5616 2013-04-10 07:54:55Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
	<div class="js_shoutbox_messages {if isset($bShoutboxAjax)}row2 row_first{else}{if is_int($iShoutCount/2)}row1{else}row2{/if}{if ($iShoutCount + 1) == 1} row_first{/if}{/if}" style="position:relative;">
	{if Phpfox::getUserParam('shoutbox.can_delete_all_shoutbox_messages')}
		<a href="#" class="shoutbox_delete" onclick="if (confirm('{phrase var='shoutbox.are_you_sure' phpfox_squote=true}')) {left_curly} $(this).parents('.js_shoutbox_messages:first').remove(); $.ajaxCall('shoutbox.delete', 'id={$aShoutout.shout_id}&amp;module={$aShoutout.module}'); {right_curly} return false;" title="{phrase var='shoutbox.delete_this_shoutout'}">{img theme='misc/delete.gif'}</a>
	{/if}
		<div class="shoutbox_image">
			{img user=$aShoutout suffix='_50_square' max_width=20 max_height=20 style='vertical-align:middle;'}
		</div>
		<div class="shoutbox_content">
			{$aShoutout|user:'':'':30}
			<div class="shoutbox_text">
				{$aShoutout.text}
			</div>
			<div class="shoutbox_time">
				{$aShoutout.time_stamp|date:'shoutbox.shoutbox_time_stamp'}
			</div>
		</div>
	</div>

