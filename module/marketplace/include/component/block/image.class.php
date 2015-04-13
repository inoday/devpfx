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
 * @version 		$Id: image.class.php 2595 2011-05-09 14:01:09Z Raymond_Benc $
 */
class Marketplace_Component_Block_Image extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		if (!($aListing = $this->getParam('aListing')))
		{
			return false;
		}
		
		if (empty($aListing['image_path']))
		{
			// return false;
		}
		
		$this->template()->assign(array(
				'aImages' => Phpfox::getService('marketplace')->getImages($aListing['listing_id'])
			)
		);

		$sExchangeRate = '';
		if ($aListing['currency_id'] != Phpfox::getService('core.currency')->getDefault())
		{
			if (($sAmount = Phpfox::getService('core.currency')->getXrate($aListing['currency_id'], $aListing['price'])))
			{
				$sExchangeRate .= ' (' . Phpfox::getService('core.currency')->getCurrency($sAmount) . ')';
			}
		}

		$this->template()->assign(array(
				'sHeader' => ($aListing['price'] == '0.00' ? Phpfox::getPhrase('marketplace.free') : Phpfox::getService('core.currency')->getCurrency(number_format($aListing['price'], 2), $aListing['currency_id'])) . $sExchangeRate . ($aListing['view_id'] == '2' ? ' (' . Phpfox::getPhrase('marketplace.sold') . ')' : '')
			)
		);

		return 'block';
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('marketplace.component_block_image_clean')) ? eval($sPlugin) : false);
	}
}

?>