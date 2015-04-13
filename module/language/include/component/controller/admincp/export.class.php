<?php

class Language_Component_Controller_Admincp_Export extends Phpfox_Component {
	public function process() {
		$this->is_dev();

		$aLanguage = Phpfox::getService('language')->getLanguage($this->request()->get('id'));

		$this->template()->setTitle('Exporting Language Package')
			// ->setBreadcrumb(Phpfox::getPhrase('theme.themes'), $this->url()->makeUrl('admincp.theme'))
			->setBreadCrumb('Exporting Language Package', $this->url()->makeUrl('current'))
			// ->setBreadcrumb($aTheme['name'], null, true)
			->assign(array(
					'aLanguage' => $aLanguage,
					'public_key' => MOXI9_PUBLIC_KEY,
					'is_completed' => $this->request()->get('done')
				)
			);
	}
}

