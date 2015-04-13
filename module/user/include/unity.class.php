<?php

class Unity_User extends Api_Service_Api {

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

		return  $this->user($post['user_id']);
	}

	public function add() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'name', 'email', 'password'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Process = new User_Service_Process();
		$user_id = $Process->add(array(
			'full_name' => $post['name'],
			'email' => $post['email'],
			'password' => $post['password'],
			'gender' => 1,
			'day' => 22,
			'month' => 06,
			'year' => 1982
		));

		return $user_id;
	}
}