<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: final.html.php 759 2009-07-14 07:44:23Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{$sCreateJs}
<script type="text/javascript">
function addUser()
{l}
	$('.button').attr('disabled', true);
	$('.button').val('...');
{r}
</script>
<form method="post" action="{url link=""$sUrl".final"}" id="js_form" onsubmit="if ({$sGetJsForm}) {l} addUser(); {r} else {l} return false; {r}">
	<div class="table_header">
		Administrators Account
	</div>
	<div class="table table_full">
		<input type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" placeholder="Display Name" />
	</div>
	<div class="table table_full">
		<input type="password" name="val[password]" id="password" value="{value type='input' id='password'}" size="30" placeholder="Password" />
	</div>
	<div class="table table_full">
		<input type="text" name="val[email]" id="email" value="{value type='input' id='email'}" size="30" placeholder="Email" />
	</div>
	<div class="table_clear">
		<input type="submit" value="Submit" class="button" />
	</div>
</form>