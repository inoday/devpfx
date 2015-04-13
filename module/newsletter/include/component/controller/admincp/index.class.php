<?php

class Newsletter_Component_Controller_Admincp_Index extends Phpfox_Component {
	public function process() {
		$this->url()->send('admincp.newsletter.manage');
	}
}