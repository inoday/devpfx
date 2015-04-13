<?php

defined('PHPFOX') or exit('NO DICE!');

class Api_Component_Controller_Page extends Phpfox_Component {
	public function process() {
		$data = Phpfox::getService('api')->run();

		$this->template()->assign(array(
			'app_html' => $data
		));
	}
}

?>