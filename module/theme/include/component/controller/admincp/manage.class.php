<?php

class Theme_Component_Controller_Admincp_Manage extends Phpfox_Component {
	public function process() {

		Phpfox::isUser(true);
		Phpfox::getUserParam('admincp.has_admin_access', true);

		$theme_id = $this->request()->getInt('id');

		$theme = Phpfox::getService('theme')->getTheme($theme_id);

		if ($this->request()->get('delete')) {
			$aStyle = Phpfox::getService('theme.style')->getStyle($theme['default_style']['style_id']);
			$path = PHPFOX_DIR . 'theme' . PHPFOX_DS . 'frontend' . PHPFOX_DS . '' . $aStyle['theme_folder'] . '' . PHPFOX_DS . 'style' . PHPFOX_DS . '' . $aStyle['folder'] . '' . PHPFOX_DS . 'image' . PHPFOX_DS . $this->request()->get('image');
			if (file_exists($path)) {
				unlink($path);
			}
			exit;
		}

		if ($this->request()->get('upload')) {

			$file = $_FILES['file']['name'];
			if (substr($file, -4) != '.png' && substr($file, -4) != '.gif' && substr($file, -4) != '.jpg') {

			} else {
				$aStyle = Phpfox::getService('theme.style')->getStyle($theme['default_style']['style_id']);
				$path = PHPFOX_DIR . 'theme' . PHPFOX_DS . 'frontend' . PHPFOX_DS . '' . $aStyle['theme_folder'] . '' . PHPFOX_DS . 'style' . PHPFOX_DS . '' . $aStyle['folder'] . '' . PHPFOX_DS . 'image' . PHPFOX_DS;
				move_uploaded_file($_FILES['file']['tmp_name'], $path . $_FILES['file']['name']);
				echo '$(\'.theme_images\').append("<li>' . strip_tags($_FILES['file']['name']) . '</li>");';
			}
			exit;
		}

		switch ($this->request()->get('type')) {
			case 'images':
				$images = Phpfox::getService('theme.style')->getImageDir($theme['default_style']['style_id']);

				$this->template()->assign(array(
					'images' => $images
				));
				break;
			case 'js':
				$js_content = Phpfox::getService('theme.style')->getJs($theme['default_style']['style_id']);

				$this->template()
					->assign('js_content', $js_content)
					->setHeader(array(
					'template.css' => 'style_css',
					'script.js' => 'module_theme'
				));

				break;
			case 'css':
				$aStyle = Phpfox::getService('theme.style')->getStyle($theme['default_style']['style_id']);
				$aCustomDataContent = Phpfox::getService('theme.style')->getStyleContent($theme['default_style']['style_id']);
				$this->template()->assign(array(
					'aCustomDataContent' => $aCustomDataContent,
					'aStyle' => $aStyle
				));

				$this->template()->setHeader(array(
					'template.css' => 'style_css',
					'style.js' => 'module_theme'
				));
				break;
			default:
				$templates = Phpfox::getService('theme.template')->get($theme['folder']);

				$this->template()->assign(array(
					'templates' => $templates,
					'aProducts' => Phpfox::getService('admincp.product')->get()
				));

				$this->template()->setHeader(array(
					'template.js' => 'module_theme',
					'template.css' => 'style_css'
				));
				break;
		}

		/*
		 * <li><a href="{url link='admincp.theme.manage' id=$aTheme.theme_id}">HTML</a></li>
		<li><a href="{url link='admincp.theme.manage' id=$aTheme.theme_id type='css'}">CSS</a></li>
		<li><a href="{url link='admincp.theme.manage' id=$aTheme.theme_id type='js'}">JavaScript</a></li>
		<li><a href="{url link='admincp.theme.manage' id=$aTheme.theme_id type='images'}">Images</a></li>
		 */
		$theme_menus = array(
			'' => 'HTML',
			'css' => 'CSS',
			'js' => 'JavaScript',
			'images' => 'Images'
		);

		$menus = array();
		foreach ($theme_menus as $key => $name) {
			$is_active = false;
			if ($this->request()->get('type') == $key) {
				$is_active = true;
			}

			$menus[] = array(
				'is_active' => $is_active,
				'name' => $name,
				'link' => $this->url()->makeUrl('admincp.theme.manage', array('id' => $theme['theme_id'], 'type' => $key))
			);
		}

		$this->template()
			->assign(array(
				'aTheme' => $theme,
				'theme_menus' => $menus,
				'type' => $this->request()->get('type')
			))
			->setHeader('cache', array(
					'<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" charset="utf-8"></script>',
					'jquery/plugin/jquery.scrollTo.js' => 'static_script',
					'jquery/plugin/jquery.highlightFade.js' => 'static_script',
				)
			);
	}
}