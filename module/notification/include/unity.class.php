<?php

class Unity_Notification extends Api_Service_Api {
	public function add() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'notify_user_id', 'title', 'link'
			)
		);

		if (!($post = $this->check($params))) {
			return false;
		}

		$Notification = new Notification_Service_Process();
		return $Notification->add($post['app_id'], 0, $post['notify_user_id'], $post['user_id'], $post['title'], $post['link']);
	}

	public function get() {
		$params = array(
			'type' => 'GET',
			'required' => array(
				'user_id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$notifications = Phpfox::getService('notification')->get();

		$return = array();
		foreach ($notifications as $notify) {
			$return[] = array(
				'title' => $notify['message'],
				'link' => $notify['message'],
				'user' => $this->user($notify['user_id'])
			);
		}

		return $return;
	}
}