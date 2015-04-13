<?php

class Theme_Component_Block_Install extends Phpfox_Component {
	public function process() {
		$data = Phpfox::getLib('phpfox.api')->secure('installtheme');
		if (substr($data, 0, 1) == '{') {
			if (Phpfox::getService('theme.process')->unityInstall(json_decode($data))) {
				Phpfox::addMessage('Successfully installed the theme.');
				echo 'window.location.href = \'' . $this->url()->makeUrl('admincp.theme') . '\'';
				exit;
			}
		} else {
			echo '$(\'#unity_install_theme\').html(\'<div class="error_message">' . $data . '</div>\');';
		}
	}
}