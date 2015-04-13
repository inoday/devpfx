<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: register-top.html.php 4480 2012-07-06 08:03:22Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="guest_panel">
	<a href="{url link=''}" id="logo">SiteName</a>
	{if (!$hide_blocks)}
	<ul>
		<li><a href="{url link='user.register'}" data-type="signup" class="signup no_ajax_link">Signup</a></li>
		<li><a href="{url link='user.login'}" data-type="login" class="login no_ajax_link">Login</a></li>
	</ul>
	{/if}
</div>

{if (!$hide_blocks)}
<div class="guest_panel_drop gpd_signup">
	<div class="guest_panel_drop_holder">
		<span class="gpd_close">Close</span>
		<div class="gpd_title">Signup</div>
		{module name='user.register'}
	</div>
</div>

<div class="guest_panel_drop gpd_login">
	<div class="guest_panel_drop_holder">
		<span class="gpd_close">Close</span>
		<div class="gpd_title">Login</div>
		{module name='user.login-panel'}
	</div>
</div>
{/if}