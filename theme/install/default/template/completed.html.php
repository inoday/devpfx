<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: completed.html.php 5350 2013-02-13 10:59:22Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="nb_message_holder">
	{if $bIsUpgrade}
	Successfully upgraded to PHPfox version {$sUpgradeVersion}.
	{else}
	Successfully installed PHPfox {$sUpgradeVersion}.
	{/if}
</div>

<a href="../index.php" class="installed_link">View Your Site</a>