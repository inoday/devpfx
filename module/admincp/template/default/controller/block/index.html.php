<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: index.html.php 4481 2012-07-06 08:05:15Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul>
	{foreach from=$aBlocks key=sUrl item=aModules}
	<li class="main_menu_link_li"><a class="main_menu_link" href="#" onclick="$('#frame_holder_cover').show(); $.ajaxCall('admincp.getBlocks', 'm_connection={$sUrl}', 'GET'); $(this).blur(); $('.main_menu_link').removeClass('cem_active'); $(this).addClass('cem_active'); return false;">{if empty($sUrl)}{phrase var='admincp.site_wide'}{else}{$sUrl}{/if}</a></li>
	{/foreach}
</ul>