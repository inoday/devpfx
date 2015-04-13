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
 * @package  		Module_Admincp
 * @version 		$Id: index.class.php 7202 2014-03-18 13:38:56Z Raymond_Benc $
 */
class Admincp_Component_Controller_Index extends Phpfox_Component
{
	private $_sController = 'index';
	private $_sModule;

	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		Phpfox::isUser(true);
		Phpfox::getUserParam('admincp.has_admin_access', true);

		if (Phpfox::getParam('core.admincp_http_auth'))
		{
			$aAuthUsers = Phpfox::getParam('core.admincp_http_auth_users');

			if((isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && isset($aAuthUsers[Phpfox::getUserId()])) && (($_SERVER['PHP_AUTH_USER'] == $aAuthUsers[Phpfox::getUserId()]['name']) && ($_SERVER['PHP_AUTH_PW'] == $aAuthUsers[Phpfox::getUserId()]['password'])))
			{

			}
			else
			{
				header("WWW-Authenticate: Basic realm=\"AdminCP\"");
				header("HTTP/1.0 401 Unauthorized");
				exit("NO DICE!");
			}
		}

		if (Phpfox::getParam('admincp.admin_cp') != $this->request()->get('req1'))
		{
			return Phpfox::getLib('module')->setController('error.404');
		}

		if (!Phpfox::getService('user.auth')->isActiveAdminSession())
		{
			return Phpfox::getLib('module')->setController('admincp.login');
		}

		if ($this->request()->get('upgraded'))
		{
			Phpfox::getLib('cache')->remove();
			Phpfox::getLib('template.cache')->remove();

			$this->url()->send('admincp');
		}

		$this->_sModule = (($sReq2 = $this->request()->get('req2')) ? strtolower($sReq2) : Phpfox::getParam('admincp.admin_cp'));
		if ($this->_sModule == 'logout')
		{
			$this->_sController = $this->_sModule;
			$this->_sModule = 'admincp';
		}
		else
		{
			$this->_sController = (($sReq3 = $this->request()->get('req3')) ? $sReq3 : $this->_sController);
		}
		if ($sReq4 = $this->request()->get('req4'))
		{
			$sReq4 = str_replace(' ', '', strtolower(str_replace('-', ' ', $sReq4)));
		}
		$sReq5 = $this->request()->get('req5');

		$bPass = false;
		if (file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . '.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController;
			$bPass = true;
		}

		if (!$bPass && $sReq5 && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . $sReq4 . PHPFOX_DS . $sReq5 . '.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.' . $sReq4 . '.' . $sReq5;
			$bPass = true;
		}

		if (!$bPass && $sReq4 && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . $sReq4 . '.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.' . $sReq4;
			$bPass = true;
		}

		if (!$bPass && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . $this->_sController . '.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.' . $this->_sController;
			$bPass = true;
		}

		if (!$bPass && $sReq4 && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . $sReq4 . '.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.' . $sReq4;
			$bPass = true;
		}

		if (!$bPass && $sReq4 && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . $sReq4 . PHPFOX_DS . 'index.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.' . $sReq4 . '.index';
			$bPass = true;
		}

		if (!$bPass && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . 'admincp' . PHPFOX_DS . $this->_sController . PHPFOX_DS . 'index.class.php'))
		{
			$this->_sController = 'admincp.' . $this->_sController . '.index';
			$bPass = true;
		}

		if (!$bPass && file_exists(PHPFOX_DIR_MODULE . 'admincp' . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . $this->_sModule . PHPFOX_DS . $this->_sController . '.class.php'))
		{
			$this->_sController = $this->_sModule . '.' . $this->_sController;
			$this->_sModule = 'admincp';
			$bPass = true;
		}

		if (!$bPass && $sReq4 && file_exists(PHPFOX_DIR_MODULE . 'admincp' . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . $this->_sModule . PHPFOX_DS . $this->_sController . PHPFOX_DS . $sReq4 . '.class.php'))
		{
			$this->_sController = $this->_sModule . '.' . $this->_sController . '.' . $sReq4;
			$this->_sModule = 'admincp';
			$bPass = true;
		}

		if (!$bPass && Phpfox::getParam('admincp.admin_cp') != 'admincp' && file_exists(PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . $this->_sController . '.class.php'))
		{
			$bPass = true;
		}

		// Get the menu we will used to display all the "Modules"
		$aModules = Phpfox::getService('admincp.module')->getAdminMenu();

		// Create AdminCP menu
		$aMenus = array(
			'admincp.extensions' => array(
				'admincp.module' => array(
					'admincp.manage_modules' => 'admincp.module',
					'admincp.create_new_module' => 'admincp.module.add',
					'admincp.add_component' => 'admincp.component.add',
					'admincp.manage_components' => 'admincp.component'
				),
				'admincp.language' => array(
					'admincp.manage_language_packs' => 'admincp.language',
					'admincp.phrase_manager' => 'admincp.language.phrase',
					'admincp.add_phrase' => 'admincp.language.phrase.add',
					'language.create_language_pack' => 'admincp.language.add',
					'language.import_language_pack' => 'admincp.language.import',
					'language.email_phrases' => 'admincp.language.email'
				),
				'admincp.products' => array(
					'admincp.manage_products' => 'admincp.product',
					'admincp.create_new_product' => 'admincp.product.add',
					'admincp.import_export' => 'admincp.product.file'
				),
				'admincp.plugin' => array(
					'admincp.manage_plugins' => 'admincp.plugin',
					'admincp.create_new_plugin' => 'admincp.plugin.add'
				),
				'admincp.theme' => array(
					'admincp.manage_themes' => 'admincp.theme',
					'theme.admincp_menu_create_theme' => 'admincp.theme.add',
					'theme.admincp_menu_create_style' => 'admincp.theme.style.add',
					'theme.create_a_new_template' => 'admincp.theme.template.add',
					'theme.admincp_create_css_file' => 'admincp.theme.style.css.add',
					'theme.admincp_menu_import_themes' => 'admincp.theme.import',
					'theme.admincp_menu_import_styles' => 'admincp.theme.style.import'
				),
				'admincp.plugin' => array(
					'admincp.manage_plugins' => 'admincp.plugin',
					'admincp.create_new_plugin' => 'admincp.plugin.add'
				)
			),
			'admincp.settings' => array(
				'admincp.system_settings_menu' => array(
					'admincp.manage_settings' => 'admincp.setting',
					'admincp.add_new_setting' => 'admincp.setting.add',
					'admincp.add_new_setting_group' => 'admincp.setting.group.add',
					'admincp.find_missing_settings' => 'admincp.setting.missing'
					// 'admincp.language_import_export' => 'admincp.setting.file'
				),
				/**
				 * move to settings
				'admincp.payment_gateways_menu' => 'admincp.api.gateway'
				 * /
			),
			'admincp.tools' => array(
				'admincp.general' => array(
					'core.site_statistics' => 'admincp.core.stat',
					'core.admincp_menu_system_overview' => 'admincp.core.system',
					'admincp.ip_address' => 'admincp.core.ip',
					'admincp.admincp_privacy' => 'admincp.privacy'
				),

				/*
				 * move to Settings

				'admincp.user_cancellation_options' => array(
					'admincp.user_cancellation_options_add' => 'admincp.user.cancellations.add',
					'admincp.user_cancellation_options_manage' => 'admincp.user.cancellations.manage'
				),
				*/

				/*
				 * move to Mail
				'admincp.mail_messages' => array(
					'admincp.view_messages' => 'admincp.mail.private'
				),
				*/

				/*
				 * move to Settings
				'core.admincp_menu_country' => array(
					'core.admincp_menu_country_manager' => 'admincp.core.country',
					'core.admincp_menu_country_add' => 'admincp.core.country.add',
					'core.admincp_menu_country_child_add' => 'admincp.core.country.child.add',
					'core.admincp_menu_country_import' => 'admincp.core.country.import'
				),
				*/

				/*
				 * move to Settings
				'core.currency' => array(
					'core.add_currency' => 'admincp.core.currency.add'
				),
				*/

				/**
				 * move to Settings -> SEO
				'admincp.seo' => array(
					'admincp.custom_elements' => 'admincp.seo.meta',
					'admincp.nofollow_urls' => 'admincp.seo.nofollow',
					'admincp.rewrite_url' => 'admincp.seo.rewrite'
				)
				*/
			)
		);

		$tools = array(
			'admincp.general' => array(
				'core.site_statistics' => 'admincp.core.stat',
				'core.admincp_menu_system_overview' => 'admincp.core.system',
				'admincp.ip_address' => 'admincp.core.ip',
				'admincp.admincp_privacy' => 'admincp.privacy'
			),
			'admincp.maintenance' => array(
				'admincp.menu_cache_manager' => 'admincp.maintain.cache',
				'admincp.admincp_menu_reparser' => 'admincp.maintain.reparser',
				'admincp.remove_duplicates' => 'admincp.maintain.duplicate',
				'admincp.counters' => 'admincp.maintain.counter',
				'admincp.check_modified_files' => 'admincp.checksum.modified',
				'admincp.check_unknown_files' => 'admincp.checksum.unknown'
			),
			'admincp.sql' => array(
				'admincp.sql_maintenance' => 'admincp.sql',
				'admincp.alter_title_fields' => 'admincp.sql.title'
			)
		);

		(($sPlugin = Phpfox_Plugin::get('admincp.component_controller_index_process_menu')) ? eval($sPlugin) : false);

		$aUser = Phpfox::getUserBy();

		list($setting_groups, $setting_modules, $product_groups) = Phpfox::getService('admincp.setting.group')->get();

		$setting_groups[Phpfox::getPhrase('ban.ban_filters')] = array(
			'url' => 'admincp.ban.username'
		);

		$setting_groups['Currencies'] = array(
			'url' => 'admincp.core.currency'
		);

		$setting_groups['SEO'] = array(
			'url' => 'admincp.setting.edit.group-id_search_engine_optimization'
		);

		ksort($setting_groups);

		$extra_settings = array();

		/*
		$extra_settings['ban.ban_filters'] = array(
			'ban.ban_filter_username' => 'admincp.ban.username',
			'ban.ban_filter_email' => 'admincp.ban.email',
			'ban.ban_filter_display_name' => 'admincp.ban.display',
			'ban.ban_filter_ip' => 'admincp.ban.ip',
			'ban.ban_filter_word' => 'admincp.ban.word'
		);
		*/

		/*
		$themes = Phpfox::getService('theme')->get();
		foreach ($themes as $key => $theme) {
			if ($theme['folder'] == 'default') {
				unset($themes[$key]);
			}
		}
		*/

		$module_menu = array();
		foreach ($aModules as $module) {
			if ($module['module_id'] == 'subscribe' || $module['module_id'] == 'user') {
				continue;
			}
			$module_menu[] = $module;
		}

		/*
		if (defined('MOXI9_IS_DEV')) {
			$techie = [];

			$techie['Modules'] = [
				'admincp.module' => 'Browse Modules'
			];

			$this->template()->assign('techie', $techie);
		}
		*/

		if (!defined('MOXI9_IS_DEMO')) {
			$this->template()->assign('aNewProducts', Phpfox::getService('admincp.product')->getNewProductsForInstall());
		}

		$this->template()->assign(array(
				'extra_settings' => $extra_settings,
				'aModulesMenu' => $module_menu,
				'setting_groups' => $setting_groups,
				// 'themes' => $themes,
				'tools' => $tools,
						'aUserDetails' => $aUser,
						'sPhpfoxVersion' => PhpFox::getVersion(),
						'sSiteTitle' => Phpfox::getParam('core.site_title')
					)
				)->setHeader(array(
					'menu.css' => 'style_css',
					'menu.js' => 'style_script',
					'admin.js' => 'static_script'
				)
			)->setTitle(Phpfox::getPhrase('admincp.admin_cp'));

		if ($bPass)
		{
			Phpfox::getLib('module')->setController($this->_sModule . '.' . $this->_sController);

			$sMenuController = str_replace(array('.index', '.phrase'), '', 'admincp.' . ($this->_sModule != 'admincp' ? $this->_sModule . '.' . str_replace('admincp.', '', $this->_sController) : $this->_sController));
			$aCachedSubMenus = array();
			$sActiveSideBar = '';
			$sOriginalController = $sMenuController;

			if ($sMenuController == 'admincp.setting.edit' && $this->request()->get('module-id'))
			{
				$sMenuController = 'admincp.setting.edit.module-id_' . $this->request()->get('module-id');
			}

			if ($sMenuController == 'admincp.module.add' && $this->request()->get('id'))
			{
				$sMenuController = 'admincp.module.add.id_' . $this->request()->get('id');
			}

			if ($sMenuController == 'admincp.user.group.settings' && $this->request()->get('id'))
			{
				$sMenuController = 'admincp.user.group.settings.id_' . $this->request()->get('id');
			}

			if ($sMenuController == 'admincp.user.browse') {
				$sMenuController = 'admincp.user.browse';
			}

			if ($this->_getMenuName() !== null)
			{
				$sMenuController = $this->_getMenuName();
			}

			foreach ($aMenus as $sKey => $aSubMenus)
			{
				if (is_array($aSubMenus))
				{
					foreach ($aSubMenus as $sSubkey => $mSubMenus)
					{
						if (is_array($mSubMenus))
						{
							foreach ($mSubMenus as $sSubkey2 => $mSubMenus2)
							{
								if ($sMenuController == $mSubMenus2)
								{
									$sActiveSideBar = $sSubkey;

									foreach ($aSubMenus as $sSubkey3 => $mSubMenus3)
									{
										if (is_array($mSubMenus3))
										{
											$aCachedSubMenus[$sSubkey3] = $mSubMenus3;
										}
										else
										{
											$aCachedSubMenus[$sKey][$sSubkey3] = $mSubMenus3;
										}
									}
								}
							}
						}
						else
						{
							if ($sMenuController == $mSubMenus)
							{
								$sActiveSideBar = $sKey;

								foreach ($aSubMenus as $sSubkey3 => $mSubMenus3)
								{
									if (is_array($mSubMenus3))
									{
										$aCachedSubMenus[$sSubkey3] = $mSubMenus3;
									}
									else
									{
										$aCachedSubMenus[$sKey][$sSubkey3] = $mSubMenus3;
									}
								}
							}
						}
					}
				}
			}

			$bIsModuleConnection = false;
			if (!$aCachedSubMenus)
			{
				$bIsModuleConnection = true;
				$sActiveSideBar = $this->_sModule;
				if ($sOriginalController == 'admincp.setting.edit' && $this->request()->get('module-id'))
				{
					$sActiveSideBar = $this->request()->get('module-id');
				}

				if ($sOriginalController == 'admincp.module.add' && $this->request()->get('id'))
				{
					$sActiveSideBar = $this->request()->get('id');
				}

				if ($sOriginalController == 'admincp.user.group.settings' && $this->request()->get('id'))
				{
					$sActiveSideBar = $this->request()->get('id');
				}

				if ($sOriginalController == 'admincp.user.browse')
				{
					$sActiveSideBar = 'user';
				}

				foreach ($aModules as $aModule)
				{
					if (!isset($aModule['module_id']))
					{
						continue;
					}

					/*
					if (!$aModule['is_menu'])
					{
						continue;
					}
					*/

					if (!is_array($aModule['menu']))
					{
						continue;
					}

					foreach ($aModule['menu'] as $sPhrase => $aLink)
					{
						$aCachedSubMenus[$aModule['module_id']][$sPhrase] = 'admincp.' . str_replace('/', '.', $aLink['url']);
					}
				}
			}

			$this->template()->assign(array(
				'sMenuController' => $sMenuController
			));

			if (!defined('PHPFOX_ADMINCP_CUSTOM_MENU')) {
				if ($this->request()->get('req2') == 'page'
					|| $this->request()->get('req2') == 'menu'
					|| $this->request()->get('req2') == 'theme'
					|| ($this->request()->get('req2') == 'user'
						&& $sOriginalController != 'admincp.user.browse'
						&& $sOriginalController != 'admincp.user.group.settings'
					)
				) {
					$bIsModuleConnection = false;
				}

				if ($sActiveSideBar == 'admincp'
					&& $sOriginalController != 'admincp.user.group.settings'
					&& $sOriginalController != 'admincp.module.add'
					&&  $sOriginalController != 'admincp.setting.edit') {
					$bIsModuleConnection = false;
				}

				if ($sActiveSideBar == 'admincp' && $sOriginalController == 'admincp.setting.edit' && $this->request()->get('group-id')) {
					$bIsModuleConnection = false;
				}

				// p($sOriginalController); exit;

				if (defined('MOXI9_IS_DEV') && $bIsModuleConnection) {
					// $bIsModuleConnection = true;
					if (!isset($aCachedSubMenus[$sActiveSideBar])) {
						$aCachedSubMenus[$sActiveSideBar] = array();
					}

					// $aCachedSubMenus[$sActiveSideBar]['SPACE'] = '';
					$this_module = $this->request()->get('id');
					if (empty($this_module) && $this->request()->get('module-id')) {
						$this_module = $this->request()->get('module-id');
					}

					if (empty($this_module)) {
						$this_module = $this->request()->get('req2');
					}
					$aCachedSubMenus[$sActiveSideBar]['admincp.edit_module'] = 'admincp.module.add.id_' . $this_module;
				}

				$this->template()->assign(array(
						'aCachedSubMenus' => $aCachedSubMenus,
						'sActiveSideBar' => $sActiveSideBar,
						'bIsModuleConnection' => $bIsModuleConnection,
						'aActiveMenus' => (($bIsModuleConnection && isset($aCachedSubMenus[$sActiveSideBar])) ? $aCachedSubMenus[$sActiveSideBar] : array())
					)
				);
			}
		}
		else
		{
			if ($this->_sModule != Phpfox::getParam('admincp.admin_cp'))
			{
				Phpfox::getLib('module')->setController('error.404');
			}
			else
			{
				// Phpfox::getService('admincp')->check();
				/*
				define('PHPFOX_CAN_MOVE_BLOCKS', true);

				$this->template()->setHeader('cache', array(
							'sort.js' => 'module_theme',
							'design.js' => 'module_theme',
							'jquery/ui.js' => 'static_script',
						)
					)
					->setHeader(array(
						'<script type="text/javascript">function designOnUpdate() { $Core.design.updateSorting(); }</script>',
						'<script type="text/javascript">$Core.design.init({type_id: \'admincp\'});</script>'
					)
				);

				Phpfox::getLib('module')->setCacheBlockData(array(
						'table' => 'admincp_dashboard',
						'field' => 'user_id',
						'item_id' => Phpfox::getUserId(),
						'controller' => 'admincp.index'
					)
				);
				 */

				$this->template()->setBreadcrumb(Phpfox::getPhrase('admincp.dashboard'))
					->setTitle(Phpfox::getPhrase('admincp.dashboard'))
					->assign(array(
						'bIsModuleConnection' => false,
						'bIsDashboard' => true
					)
				);
			}
		}
	}

	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('admincp.component_controller_index_clean')) ? eval($sPlugin) : false);
	}
}

?>