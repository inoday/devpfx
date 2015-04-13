<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Theme
 * @version 		$Id: index.html.php 1298 2009-12-05 16:19:23Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{foreach from=$aThemes item=theme}
<div class="themes{if ($theme.is_default)} is_default{/if}" data-src="{$theme.image}">
	<a href="{url link='admincp.theme.manage' id=$theme.theme_id}">
		<span class="phrase">{$theme.name|clean}</span>
	</a>
</div>
{/foreach}