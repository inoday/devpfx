<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_login">
	<form method="post" action="{url link='current'}">
		<div class="adminp_login_body">
			<div class="table_header">
				{phrase var='admincp.admincp_login'}
			</div>
			{error}
			<div class="table">
				<input id="admincp_login_email" type="email" name="val[email]" value="{value id='email' type='input'}" size="40" placeholder="{phrase var='admincp.email'}" />
			</div>
			<div class="table">
				<input type="password" name="val[password]" value="{value id='password' type='input'}" size="40" placeholder="{phrase var='admincp.password'}" />
			</div>			
			<div class="table_clear">
				<input id="admincp_btn_login" type="submit" value="{phrase var='admincp.login'}" class="button" />
				<div id="admincp_site_link">
					<a href="{url link=''}">{phrase var='admincp.back_to_site'}</a>
				</div>                                                                                            				
			</div>			
		</div>
	</form>
</div>