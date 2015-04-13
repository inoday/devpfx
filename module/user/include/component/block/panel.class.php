<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

class User_Component_Block_Panel extends Phpfox_Component {
	public function process() {
		$user = Phpfox::getUserBy();

		$this->template()->assign(array(
			'user_image' => Phpfox::getLib('image.helper')->display(array('user' => $user, 'suffix' => '_50_square', 'max_width' => 50, 'max_height' => 50)),
			'user' => $user
		));
	}
}