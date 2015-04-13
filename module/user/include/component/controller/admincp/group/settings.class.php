<?php

class User_Component_Controller_Admincp_Group_Settings extends Phpfox_Component {
	public function process() {
		$settings = Phpfox::getService('user.group.setting')->getByModule($this->request()->get('id'));

		$this->template()->setTitle('User Group Settings')
			->setBreadcrumb('Modules', '#modules')
			->setBreadCrumb($this->request()->get('id'), null)
			->setBreadCrumb('User Group Settings', $this->url()->makeUrl('current'), true)
			->assign(array(
				'settings' => $settings,
				'aCurrency' => array()
			));
	}
}