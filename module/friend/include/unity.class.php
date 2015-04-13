<?php

class Unity_Friend extends Api_Service_Api {
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

		$Friend = new Friend_Service_Friend();
		list($total, $rows) = $Friend->get(array('AND friend.is_page = 0 AND friend.user_id = ' . $post['user_id']), 'friend.time_stamp DESC', $post['page'], 50);

		$friends = array();
		foreach ($rows as $row) {
			$friends[] = array(
				'friend_id' => $row['friend_id'],
				'user' => $this->user($row['user_id'])
			);
		}

		return $friends;
	}

	public function request() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'friend_id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Friend = new Friend_Service_Friend();
		if ($Friend->isFriend($post['user_id'], $post['friend_id'])) {
			return Phpfox_Error::set('Already friends.');
		}

		return Phpfox::getService('friend.request.process')->add($post['user_id'], $post['friend_id']);
	}

	public function accept() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'request_id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Friend = new Friend_Service_Process();

		$request = $this->database()->select('*')->from(Phpfox::getT('friend_request'))->where('request_id = ' . (int) $post['request_id'])->execute('getSlaveRow');

		return $Friend->add($request['user_id'], $request['friend_user_id']);
	}

	public function remove() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'friend_id'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Friend = new Friend_Service_Process();
		return $Friend->delete($post['friend_id'], false);
	}
}