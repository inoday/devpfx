<?php

class Unity_Like extends Api_Service_Api {

	public function stream() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'stream_id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Like_Process = new Like_Service_Process();
		$return = $Like_Process->add($post['app_id'], $post['stream_id']);

		return $return;
	}
}