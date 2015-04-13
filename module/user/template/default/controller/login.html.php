<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: login.html.php 3445 2011-11-03 13:11:23Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{$sCreateJs}
<div class="main_break">
	<form method="post" action="{url link="user.login"}" id="js_login_form" onsubmit="{$sGetJsForm}">
		<div class="table">
			<div class="table_right table_right_input">
				<input type="text" name="val[login]" id="login" value="{$sDefaultEmailInfo}" size="40" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" />
			</div>
		</div>
		
		<div class="table">
			<div class="table_right table_right_input">
				<input type="password" name="val[login_password]" id="login_password" value="" size="40" placeholder="{phrase var='user.password'}" />
			</div>
			<div class="clear"></div>
		</div>

		{plugin call='user.template_controller_login_end'}
		
		<div class="table_clear">
			<div class="table_button"><input type="submit" value="{phrase var='user.login_button'}" class="button" /></div>
			<label class="table_button"><input type="checkbox" class="checkbox" name="val[remember_me]" value="" /> {phrase var='user.remember'}</label>
		</div>

		{plugin call='user.template.login_header_set_var'}
		{if isset($bCustomLogin)}
		<div class="p_top_8">
			{phrase var='user.or_login_with'}:
			<div class="p_top_4">
				{plugin call='user.template_controller_login_block__end'}
			</div>
		</div>
		{/if}
		
		<div class="table_lost_password">
			<a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
		</div>	
	</form>	
</div>