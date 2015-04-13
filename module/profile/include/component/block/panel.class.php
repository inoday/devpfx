<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: panel.class.php 341 2009-04-03 07:48:00Z Raymond_Benc $
 */
class Profile_Component_Block_Panel extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$aUser = $this->getParam('aUser');

		$aCoverPhoto = (!empty($aUser['cover_photo']) ? Phpfox::getService('photo')->getCoverPhoto($aUser['cover_photo']) : array());

		$aUserInfo = array(
			'title' => $aUser['full_name'],
			'path' => 'core.url_user',
			'file' => $aUser['user_image'],
			'suffix' => '_100_square',
			'max_width' => 100,
			'max_height' => 100,
			'no_default' => (Phpfox::getUserId() == $aUser['user_id'] ? false : true),
			'thickbox' => true,
			'class' => 'profile_user_image',
			'no_link' => true
		);

		(($sPlugin = Phpfox_Plugin::get('profile.component_block_pic_process')) ? eval($sPlugin) : false);

		$sImage = Phpfox::getLib('image.helper')->display(array_merge(array('user' => Phpfox::getService('user')->getUserFields(true, $aUser)), $aUserInfo));

		if (Phpfox::getParam('user.enable_relationship_status'))
		{
			$sRelationship = Phpfox::getService('custom')->getRelationshipPhrase($aUser);
			$this->template()->assign(array(
				'sRelationship' => $sRelationship
			));
		}

		$bCanSendPoke = Phpfox::isModule('poke') && Phpfox::getService('poke')->canSendPoke($aUser['user_id']);

		$this->template()->assign(array(
			'aUser' => $aUser,
			'bRefreshPhoto' => ($this->request()->getInt('coverupdate') ? true : false),
			'sLogoPosition' => $aUser['cover_photo_top'],
			'aCoverPhoto' => $aCoverPhoto,
			'sProfileImage' => $sImage,
			'bCanPoke' => $bCanSendPoke
		));
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('profile.component_block_panel_clean')) ? eval($sPlugin) : false);
	}
}

?>
