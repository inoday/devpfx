<?php

class Core_Component_Controller_Sample extends Phpfox_Component {
	public function process() {
		define('PHPFOX_IN_BLOCK_MODE', $this->request()->get('inadmindesignmode'));

		$content = '<ul>';
		$all_blocks = Phpfox::getService('admincp.component')->get();
		foreach ($all_blocks as $module => $blocks) {
			$list = '';
			foreach ($blocks as $block) {

				$data = $block['module_id'] . '.' . $block['component'];

				$list .= '<div class="block do_not_add js_sortable_header" data-name="' . $block['module_id'] . ';' . $block['component'] . ';' . PHPFOX_IN_BLOCK_MODE . '">' . $data . '</div>';
			}

			$content .= '<li><a href="#">' . $module . '</a><div class="js_sortable">' . $list . '</div></li>';
		}
		$content .= '</ul>';

		$this->template()->assign('all_blocks', $content);

		$this->template()->setHeader('cache', array(
			'blocks.js' => 'static_script',
			'blocks.css' => 'style_css'
		));
	}
}