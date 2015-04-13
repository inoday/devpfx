<?php

class Admincp_Component_Controller_Module_Enable extends Phpfox_Component {
	public function process() {
		$this->template()->setTitle('Enabling Modules');
		$this->template()->setBreadCrumb('Modules', $this->url()->makeUrl('admincp.module'));

		$aRow = Phpfox::getService('admincp.module')->getForEdit($this->request()->get('id'));
		if ($aRow['is_active']) {
			$this->url()->send('admincp');
		}

		$this->template()->assign(array(
			'aEnableModule' => $aRow
		));
	}
}