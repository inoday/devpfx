<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: export.html.php 1179 2009-10-12 13:56:40Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if ($is_completed)}
<div class="valid_message">
	Successfully exported theme to Unity
</div>
{else}
<div id="unity_export" data-action="theme" data-key="{$public_key}" data-extra="&theme={$aTheme.theme_id}&folder={$aTheme.folder}">
	<div class="large_loader" style="margin:50px auto;"></div>
</div>
{/if}