<?php

class Shoutbox_Component_Block_Panel extends Phpfox_Component {
	public function process() {
		$aShoutouts = Phpfox::getService('shoutbox')->getMessages(Phpfox::getParam('shoutbox.shoutbox_display_limit'));
		$this->template()->assign(array(
			'aShoutouts' => $aShoutouts
		));
	}
}