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
 * @package 		Phpfox_Service
 * @version 		$Id: process.class.php 1496 2010-03-05 17:15:05Z Raymond_Benc $
 */
class Api_Service_Api extends Phpfox_Service {
	private $_forms = array();
	private $_menus = array();

	public function check($params) {
		$request = (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ? $_POST : $_GET);

		if ($params['type'] != strtoupper($_SERVER['REQUEST_METHOD'])) {
			Phpfox_Error::set('Not a valid request method. This request must be "' . $params['type'] . '".');
		} else {
			if (isset($params['allowed'])) {

			} else {
				$params['allowed'] = $params['required'];
			}

			if (isset($params['required'])) {
				foreach ($params['required'] as $key) {
					if (!isset($request[$key])) {
						Phpfox_Error::set('Missing param "' . $key . '"');
					}
				}
			}

			$data = array();
			foreach ($request as $key => $value) {
				if (!in_array($key, $params['allowed']) && $key != 'app_id' && $key != 'page') {
					continue;
				}
				$data[$key] = $value;
			}
		}

		return (!Phpfox_Error::isPassed() ? false : $data);
	}

	public function time_stamp($time_stamp) {
		return Phpfox::getLib('date')->convertTime($time_stamp);
	}

	public function user($user_id) {
		static $cache;

		if (isset($cache[$user_id])) {
			return $cache[$user_id];
		}

		if (!$user_id) {
			return array();
		}

		$user = (object) Phpfox::getService('user')->getStaticInfo($user_id);

		$cache[$user_id] = (object) array(
			'id' => $user->user_id,
			'name' => $user->full_name,
			'name_url' => '<a href="' . Phpfox::getLib('url')->makeUrl($user->user_name) . '">' . $user->full_name . '</a>',
			'thumbnail' => Phpfox::getLib('image.helper')->display(array('user' => (array) $user, 'suffix' => '_50_square')),
			'thumbnail_small' => Phpfox::getLib('image.helper')->display(array('user' => (array) $user, 'suffix' => '_50_square', 'max_width' => 32, 'max_height' => 32)),
			'thumbnail_url' => Phpfox::getLib('image.helper')->display(array('user' => (array) $user, 'suffix' => '_50_square', 'return_url' => true)),
			'permalink' => $user->user_name,
			'gender' => (isset($user->gender) ? $user->gender : 0)
		);

		return $cache[$user_id];
	}

	public function cmd() {
		header('X-Robots-Tag: noindex, nofollow', true);

		if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
			echo json_encode(array('error' => '1'));
			exit;
		}

		if (!defined('MOXI9_PUBLIC_KEY') || !defined('MOXI9_PRIVATE_KEY')) {
			echo json_encode(array('error' => '2'));
			exit;
		}

		if ($_SERVER['PHP_AUTH_USER'] != MOXI9_PUBLIC_KEY) {
			echo json_encode(array('error' => '3'));
			exit;
		}

		if ($_SERVER['PHP_AUTH_PW'] != MOXI9_PRIVATE_KEY) {
			echo json_encode(array('error' => '4'));
			exit;
		}

		if (isset($_POST['m9actions'])) {

			switch ($_POST['m9actions']) {
				/*
				case 'language':
					$aLanguage = Phpfox::getService('language')->getLanguage($_POST['language_id']);

					$aPhrases = $this->database()->select('lp.*')
						->from(Phpfox::getT('language_phrase'), 'lp')
						->where('lp.language_id = \'' . $aLanguage['language_id'] . '\'')
						->order('lp.phrase_id ASC')
						->execute('getSlaveRows');

					$export_phrases = array();
					foreach ($aPhrases as $aPhrase) {
						$export_phrases[] = array(
							'module_id' => $aPhrase['module_id'],
							'var_name' => $aPhrase['var_name'],
							'text' => $aPhrase['text']
						);
					}

					echo json_encode($export_phrases);
					break;
				*/
				case 'theme':
					define('MOXI9_API_CALL', true);
					$theme = Phpfox::getService('theme')->getTheme($_POST['theme_id']);
					$theme['styles'][$theme['default_style']['style_id']] = $theme['default_style']['style_id'];
					$export = Phpfox::getService('theme')->export($theme);

					$export_files = array();
					$files = Phpfox::getLib('file')->getAllFiles(PHPFOX_DIR_CACHE . $export['folder']);
					foreach ($files as $file) {
						rename($file, $file . '.txt');

						$export_files[] = str_replace(PHPFOX_DIR, Phpfox::getParam('core.path'), $file) . '.txt';
					}

					echo json_encode($export_files);
					break;
			}
			exit;
		}

		if (isset($_POST['moxi9_install_product']) || isset($_POST['moxi9_uninstall_product'])) {

			if (isset($_POST['moxi9_uninstall_product'])) {
				$this->database()->delete(Phpfox::getT('apps'), 'app_id = \'' . $_POST['app_id'] . '\'');
				$this->database()->delete(Phpfox::getT('menu'), 'module_id = \'' . $_POST['app_id'] . '\'');
				$this->cache()->remove();
				echo json_encode(array('uninstalled' => 'yes'));
				exit;
			}

			$this->database()->insert(Phpfox::getT('apps'), array(
				'app_id' => $_POST['app_id'],
				'name' => $_POST['name'],
				'is_active' => 1,
				'data' => $_POST['data']
			));

			if (isset($_POST['menu'])) {
				Phpfox::getService('admincp.menu.process')->add(array(
					'product_id' => $_POST['app_id'],
					'module_id' => $_POST['app_id'] . '|' . $_POST['app_id'],
					'm_connection' => 'main',
					'url_value' => $_POST['app_id'],
					'text' => array('en' => $_POST['name']),
					'app_name' => $_POST['name'],
					'is_app' => true
				));
			}

			$this->cache()->remove();

			echo json_encode(array('installed' => 'yes'));
			exit;
		}

		$url = $_SERVER['REQUEST_URI'];
		$url_parts = explode('?do=/', $url);
		$sub_parts = explode('&', $url_parts[1]);

		$cmd = strtolower(trim($sub_parts[0], '/'));
		$parts = explode('/', $cmd);
		unset($parts[0]);

		if (!empty($sub_parts[1])) {
			foreach (explode('&', $sub_parts[1]) as $key) {
				$get_parts = explode('=', $key);
				if (!isset($get_parts[1])) {
					continue;
				}
				$_GET[$get_parts[0]] = $get_parts[1];
			}
		}

		switch ($parts[1]) {
			case 'stream':
				$parts[1] = 'feed';
				break;
			case 'boost':
				$parts[1] = 'like';
				break;
			case 'message':
				$parts[1] = 'mail';
				break;
			case 'connect':
				$parts[1] = 'friend';
				break;
		}

		if (!Phpfox::isModule($parts[1])) {
			Phpfox_Error::set('Not a valid APP.');
		}

		if (Phpfox_Error::isPassed()) {
			$unity = PHPFOX_DIR_MODULE . strtolower($parts[1]) . PHPFOX_DS . 'include' . PHPFOX_DS . 'unity.class.php';
			if (file_exists($unity)) {
				require($unity);

				$class_name = 'Unity_' . $parts[1];

				$obj = new $class_name();
				if (method_exists($obj, $parts[2])) {
					if (!empty($_REQUEST['user_id'])) {
						$user = Phpfox::getService('user')->getStaticInfo($_REQUEST['user_id']);
						Phpfox::getService('user.auth')->setUser($user);
					}
					$data = call_user_func(array($obj, $parts[2]));
				} else {
					Phpfox_Error::set('Not a valid API call. ' . $parts[2]);
				}
			} else {
				Phpfox_Error::set('This APP does not support API calls.');
			}
		}

		if (!Phpfox_Error::isPassed()) {
			echo json_encode(array('error' => true, 'error_message' => implode('', Phpfox_Error::get())));
		} else {
			echo json_encode($data);
		}
	}

	public function run() {
		$user = $this->user(Phpfox::getUserId());
		unset($user->email, $user->password, $user->password_salt);

		$get = array();
		if (!empty($_SERVER['REQUEST_URI'])) {
			$uri = explode('?', $_SERVER['REQUEST_URI']);
			if (isset($uri[1])) {
				$parts = explode('&', $uri[1]);
				foreach ($parts as $part) {
					$sub = explode('=', $part);
					$get[$sub[0]] = (isset($sub[1]) ? $sub[1] : '');
				}
			}
		}

		$url = trim((isset($_REQUEST['do']) ? $_REQUEST['do'] : ''), '/');
		unset($get['do']);

		$json = array('user' => $user, 'get' => $get, 'post' => (isset($_POST) ? $_POST : array()), 'url' => $url);
		$json['public_key'] = MOXI9_PUBLIC_KEY;
		$json['private_key'] = MOXI9_PRIVATE_KEY;

		$data = Phpfox::getLib('request')->send('https://api.moxi9.com/', array('json' => urlencode(json_encode($json))), $_SERVER['REQUEST_METHOD']);

		// p($data); exit;

		if (preg_match('/^redirect:(.*)$/i', $data, $matches)) {
			if (isset($_POST['is_ajax'])) {
				echo json_encode(array('redirect' => Phpfox::getLib('url')->makeUrl($matches[1])));
				exit;
			}
			Phpfox::getLib('url')->send(str_replace('/', '.', $matches[1]));
		}

		if (isset($_POST['is_ajax'])) {
			echo $data;
			exit;
		}

		if (preg_match('/^page:(.*)$/i', $data, $matches)) {
			define('PHPFOX_IS_APP_PAGE', true);
			if (empty($matches[1])) {
				$matches[1] = 'core.index-member';
			}
			Phpfox::getLib('module')->setController($matches[1]);
			return;
		}

		if (preg_match('/^stream:(.*)$/i', $data, $matches)) {
			define('PHPFOX_IS_APP_STREAM', $matches[1]);
			Phpfox::getLib('module')->setController('core.index-member');
			return;
		}

		/**
		 * Emulated API Server Calls - START
		 */
		$callback = function($matches) {
			$parts = explode(' ', $matches[1]);
			$type = $parts[0];
			unset($parts[0]);
			$data = implode(' ', $parts);

			$html = '';
			switch ($type) {
				case 'phrase':
					$html = $data;
					break;
				case 'url':
					$html = Phpfox::getLib('url')->makeUrl(Phpfox::getLib('request')->get('req1') . '.' . str_replace('/', '.', $data));
					break;
			}

			return $html;
		};
		$data = preg_replace_callback('/\{m:(.*?)\}/is', $callback, $data);
		/**
		 * Emulated API Server Calls - END
		 */
		$data = preg_replace_callback('!<m:([a-zA-Z0-9]+)>\s*(.*?)\s*<\/m:\\1>!s', array($this, '_m_double'), $data);
		$data = preg_replace_callback('!<m:\s*(.*?)\s* \/\>!s', array($this, '_m_single'), $data);

		if (count($this->_forms)) {
			$params = array();
			foreach ($this->_forms as $form) {
				if (isset($_POST['is_ajax_post']) && isset($form->required)) {
					$val = $_POST['val'];
					if (empty($val[$form->name])) {
						Phpfox_Error::set($form->message);
					}
				}

				$params[$form->name] = array(
					'type' => $form->type,
					'name' => $form->title
				);
			}

			// Core::Form()->build('app', $params);
			/*
			$callback = function($matches) {
				return Core::Form()->get($matches[1]);
			};
			*/
			$data = preg_replace_callback('/\[M9FORM:(.*?)]/i', array($this, '_m_form'), $data);
		}

		if ($this->request()->get('is_ajax')) {
			echo $data;
			exit;
		}

		if (count($this->_menus)) {
			$menus = [];
			foreach ($this->_menus as $menu) {
				$menus[$menu->name] = $menu->url;
			}
			Phpfox::getLib('template')->buildSectionMenu(null, $menus);
		}

		if (isset($_POST['is_ajax_post'])) {
			if (!Phpfox_Error::isPassed()) {
				echo json_encode(array('errors' => Phpfox_Error::get()));
				exit;
			}
			echo $data;
			exit;
		}

		return $data;
	}

	private function _m_form($matches) {
		$form = $this->_forms[$matches[1]];
		$input = '';
		$value = '';
		if (isset($form->value)) {
			$form->value = str_replace('&#34;', '"', $form->value);
			$value = htmlspecialchars(json_decode($form->value));
		}


		$class_name = 'table_right';
		switch ($form->type) {
			case 'select':
				$form->options = json_decode(str_replace('&#34;', '"', $form->options));
				$input = '<select name="val[' . $form->name . ']" id="js_app_' . $form->name . '">';
				foreach ($form->options as $key => $value) {
					$input .= '<option value="' . $key . '">' . $value . '</option>';
				}
				$input .= '</select>';
				break;
			case 'text':
				$input = '<input type="text" name="val[' . $form->name . ']" value="' . $value . '" id="js_app_' . $form->name . '" />';
				$class_name = 'table_right_input';
				break;
			case 'textarea':
				$class_name = 'table_right_input';
				$input = '<textarea cols="60" rows="10" name="val[' . $form->name . ']"> id="js_app_' . $form->name . '"' . $value . '</textarea>';
				break;
			case 'submit':
				return '<div class="table_clear"><ul class="table_clear_button"><li><input type="submit" value="' . $form->title . '" class="button" /></li><li class="table_clear_ajax"></li></ul></div>';
				break;
		}

		$html = '<div class="table" id="holder_app_' . $form->name . '">
						<div class="table_left">
							' . $form->title . '
						</div>
						<div class="' . $class_name . '">
							' . $input . '
						</div>
					</div>';

		return $html;
	}

	private function _m_single($matches) {
		$parts = explode(' ', $matches[1]);
		$params = array();

		preg_match_all('!([a-z0-9-]+)\="(.*?)"!s', $matches[1], $match);
		foreach ($match[1] as $iteration => $key) {
			$params[$key] = $match[2][$iteration];
		}
		$params = (object) $params;

		$html = '';
		switch ($parts[0]) {
			case 'is_user':
				Phpfox::isUser(true);
				break;
			case 'image':
				if (empty($params->id)) {
					$params->id = Phpfox::getUserId();
				}

				if (!empty($params->id)) {
					$html = Phpfox::getLib('image.helper')->display(array(
						'user' => (array) Phpfox::getService('user')->getStaticInfo($params->id),
						'suffix' => '_50_square',
						'max_width' => 50,
						'max_height' => 50
					));
				}
				break;
			case 'comments':
				$feed = array(
					'type_id' => $params->type,
					'item_id' => $params->id,
					'total_like' => $params->boosts,
					'like_type_id' => $params->type,
					'total_comment' => $params->comments,
					'comment_type_id' => $params->type,
					'privacy' => 0,
					'feed_link' => '',
					'feed_title' => ''
				);

				$html = '<div id="js_load_delayed_comments"></div><script type="text/javascript">Core.action.loadComments = function() { delete Core.action.loadComments; $.ajaxCall(\'feed.loadDelayedComments\', \'feed=' . urlencode(json_encode($feed)) . '\', \'GET\'); }</script>';
				break;
			case 'name':
				if (empty($params->id)) {
					$params->id = Phpfox::getUserId();
				}

				if (!empty($params->id)) {
					$User = Phpfox::getService('user')->getStaticInfo($params->id);
					$html = $User['full_name'];
				}
				break;
			/*
			case 'section':
				$paramArray = (array) $params;
				Core::App()->section($params->name, Phpfox::getLib('url')->link($params->url), (isset($params->add) ? array($paramArray['add-link'], $params->add) : array()));
				break;
			*/
			case 'form':
				$this->_forms[$params->name] = $params;
				$html = '[M9FORM:' . $params->name . ']';
				break;
			case 'menu':
				$this->_menus[] = $params;
				break;
			case 'connections':
				if (empty($params->id)) {
					$params->id = Phpfox::getUserId();
				}

				$Friends = new Friend_Service_Friend();
				list($total, $rows) = $Friends->get(array(
					'friend.user_id' => $params->id
				));
				if (!is_string($rows)) {
					$html .= '<div class="connection_holder" data-total="' . $total . '">' . "\n";
					foreach ($rows as $friend) {
						$html .= '<div class="connection" data-id="' . $friend['user_id']. '" data-name="' . $friend['full_name'] . '">' . "\n";
						$html .= '<div class="connection_image">' . Phpfox::getLib('image.helper')->display(array('user' => $friend, 'suffix' => '_50_square')) . '</div>' . "\n";
						$html .= '<div class="connection_content"><a href="' . Phpfox::getLib('url')->makeUrl($friend['user_name']) . '">' . $friend['full_name'] . '</a></div>' . "\n";
						$html .= '</div>' . "\n";
					}
					$html .= '</div>' . "\n";
				}
				break;
			case 'stream':
				$this->_stream_view = true;
				break;
			case 'token':
				// $token = 'token:' . App::User()->id() . ':' . $params->key . '';
				// Core::Cache()->set($token, $params->value);
				break;
		}

		return $html;
	}

	private function _m_double($matches) {
		$html = '';
		switch ($matches[1]) {
			case 'title':
				Phpfox::getLib('template')->setTitle($matches[2]);
				break;
			case 'h1':
				$parts = explode('|', $matches[2]);
				Phpfox::getLib('template')->setBreadCrumb($parts[0], (isset($parts[1]) ? Phpfox::getLib('url')->makeUrl($parts[1]) : null));
				break;
			case 'h1title':
				Phpfox::getLib('template')->setBreadCrumb($matches[2], Phpfox::getLib('url')->makeUrl('current'), true);
				break;
			case 'head':
				// Core::App()->header($matches[2]);
				break;
			case 'footer':
				// Core::App()->footer($matches[2]);
				break;
			case 'panel':
				Phpfox::getLib('module')->custom_app_data .= $matches[2];
				// Core::App()->panel .= $matches[2];
				break;
			case 'cache':
				// $this->_cache = $matches[2];
				break;
		}

		return $html;
	}
}

?>