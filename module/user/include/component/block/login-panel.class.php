<?php

class User_Component_Block_Login_Panel extends Phpfox_Component {
	public function process() {
		switch (Phpfox::getParam('user.login_type'))
		{
			case 'user_name':
				$aValidation['login'] = Phpfox::getPhrase('user.provide_your_user_name');
				break;
			case 'email':
				$aValidation['login'] = Phpfox::getPhrase('user.provide_your_email');
				break;
			default:
				$aValidation['login'] = Phpfox::getPhrase('user.provide_your_user_name_email');
		}
		$aValidation['login_password'] = Phpfox::getPhrase('user.provide_your_password');

		$oValid = Phpfox::getLib('validator')->set(array('sFormName' => 'js_login_form', 'aParams' => $aValidation));

		$this->template()->setBreadCrumb(Phpfox::getPhrase('user.login_title'))
			->setTitle(Phpfox::getPhrase('user.login_title'))
			->assign(array(
					'sCreateJs' => $oValid->createJS(),
					'sGetJsForm' => $oValid->getJsForm(),
					'sDefaultEmailInfo' => ($this->request()->get('email') ? trim(base64_decode($this->request()->get('email'))) : '')
				)
			);
	}
}