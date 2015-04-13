<?php

class Theme_Component_Controller_Admincp_Install extends Phpfox_Component {
	public function process() {
		$this->template()->setTitle(Phpfox::getPhrase('theme.themes'))
			->setBreadcrumb(Phpfox::getPhrase('theme.themes'), $this->url()->makeUrl('admincp.theme'))
			->assign(array(
				'token' => $this->request()->get('token')
			));
	}
}