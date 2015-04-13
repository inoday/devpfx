<?php

class Admincp_Component_Block_Tips extends Phpfox_Component {
	public function process() {

		return false;

		$tips = array();

		$tips[] = array(
			'title' => 'Change your sites name',
			'url' => $this->url()->makeUrl('admincp.setting.edit', array('group-id' => 'general', 'tip' => true))
		);

		$tips[] = array(
			'title' => 'Update mail settings',
			'url' => $this->url()->makeUrl('admincp.setting.edit', array('group-id' => 'mail', 'tip' => true))
		);

		$tips[] = array(
			'title' => 'Search engine optimization',
			'url' => $this->url()->makeUrl('admincp.setting.edit', array('group-id' => 'search_engine_optimization', 'tip' => true))
		);

		$tips[] = array(
			'title' => 'Create a custom theme',
			'url' => '#'
		);

		$this->template()->assign(array(
			'sHeader' => 'Getting Started',
			'tips' => $tips
		));

		return 'block';
	}
}