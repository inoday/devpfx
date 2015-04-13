<?php

class Unity_Mail extends Api_Service_Api {

	public function send() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'to', 'message'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Process = new Mail_Service_Process();
		$return = $Process->add(array(
			'to' => array($post['to']),
			'message' => $post['message']
		));

		return $return;
	}

	public function reply() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'id', 'message'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Process = new Mail_Service_Process();
		$return = $Process->add(array(
			'thread_id' => $post['id'],
			'message' => $post['message']
		));

		return $return;
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

		$cond = array();
		list($cnt, $messages, $inputs) = Phpfox::getService('mail')->get($cond, 'm.time_updated DESC', 0, 20);
		$threads = array();
		foreach ($messages as $message) {
			$users = '';
			$images = '';
			foreach ($message['users'] as $user) {
				$users .= $user['full_name'] . ', ';
				$images .= Phpfox::getLib('image.helper')->display(array('user' => $user, 'suffix' => '_50_square', 'max_width' => 32, 'max_height' => 32));
			}
			$threads[] = array(
				'id' => $message['thread_id'],
				'subject' => $message['preview'],
				'time' => $this->time_stamp($message['time_stamp']),
				'users' => rtrim($users, ', '),
				'images' => $images
			);
		}

		return $threads;
	}

	public function get_thread() {
		$params = array(
			'type' => 'GET',
			'required' => array(
				'user_id', 'id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		list($thread, $messages) = Phpfox::getService('mail')->getThreadedMail($post['id']);

		$threads = array();
		foreach ($messages as $message) {
			$threads[] = array(
				// 'id' => $message['thread_id'],
				'text' => $message['text'],
				'time' => $this->time_stamp($message['time_stamp']),
				'user' => $this->user($message['user_id'])
			);
		}

		return $threads;
	}
}