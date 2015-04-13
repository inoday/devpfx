<?php

class Unity_Feed extends Api_Service_Api {

	public function get() {
		$params = array(
			'type' => 'GET',
			'required' => array(
				'user_id'
			)
		);
		if (!($request = $this->check($params))) {
			return false;
		}

		$Feed = new Feed_Service_Feed();
		$feeds = $Feed->get(null, $_GET['id']);
		$stream = array();
		foreach ($feeds as $feed) {
			// $data = json_decode($feed['feed_data']);

			$content = (isset($feed['feed_data']['title']) ? $feed['feed_content'] : $feed['feed_status']);
			$stream[] = array(
				'stream_id' => $feed['feed_id'],
				'type_id' => $feed['type_id'],
				'user' => $this->user($feed['user_id']),
				'content_parsed' => Phpfox::getLib('parse.output')->feedStrip($content),
				'content' => $content,
				'permalink' => Phpfox::getLib('url')->permalink($feed['type_id'], $feed['feed_id'], (isset($feed['feed_data']['title']) ? $feed['feed_data']['title'] : null)),
				'title' => (isset($feed['feed_data']['title']) ? $feed['feed_data']['title'] : ''),
				'time_stamp' => $feed['time_stamp'],
				'total_boost' => $feed['total_boost'],
				'total_comment' => $feed['total_comment']
			);
		}

		if (isset($_GET['id'])) {
			return $stream[0];
		}

		return false;
	}

	public function add() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'user_id', 'type', 'content'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Feed = new Feed_Service_Process();

		return $Feed->add($post['type'], $_POST);
	}

	public function update() {
		$params = array(
			'type' => 'POST',
			'required' => array(
				'id', 'content'
			)
		);
		if (!($post = $this->check($params))) {
			return false;
		}

		$Feed = new Feed_Service_Process();

		return $Feed->update_stream($post['id'], $_POST);
	}
}