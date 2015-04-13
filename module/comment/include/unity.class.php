<?php

class Unity_Comment extends Api_Service_Api {

	public function stream() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'stream_id', 'comment'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Comment_Process = new Comment_Service_Process();
		$return = $Comment_Process->add(array(
			'parent_id' => 0,
			'comment_user_id' => 0,
			'type' => $post['app_id'],
			'item_id' => $post['stream_id'],
			'text' => $post['comment']
		));

		if (!$return) {
			return json_encode(Phpfox_Error::get());
		}

		return $return;
	}

	public function wall() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'profile_id', 'comment'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$return = Phpfox::getService('feed.process')->addComment(array(
			'parent_user_id' => $post['profile_id'],
			'user_status' => $post['comment']
		), $post['profile_id']);

		return $return;
	}
}