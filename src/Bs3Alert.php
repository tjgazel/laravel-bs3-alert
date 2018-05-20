<?php

namespace TJGazel\Bs3Alert;

use Illuminate\Session\SessionManager as Session;
use Illuminate\Config\Repository as Config;

class Bs3Alert
{
	/**
	 * The session manager.
	 * @var Session
	 */
	private $session;

	/**
	 * The Config Handler.
	 *
	 * @var Config
	 */
	private $config;

	/**
	 * The session name for toastr
	 *
	 * @var string
	 */
	private $sessionName;

	/**
	 * The messages in session.
	 *
	 * @var array
	 */
	private $messages = [];

	function __construct(Session $session, Config $config)
	{
		$this->session = $session;
		$this->config = $config;
		$this->sessionName = $config->get('bs3-alert.session_name');
	}

	/**
	 * @param array $messages
	 * @param string $title
	 * @return $this
	 */
	public function success($messages, $title = null)
	{
		$this->add($this->config->get('bs3-alert.class.success'), $messages, $title);

		return $this;
	}

	/**
	 * @param array $messages
	 * @param string $title
	 * @return $this
	 */
	public function danger($messages, $title = null)
	{
		$this->add($this->config->get('bs3-alert.class.danger'), $messages, $title);

		return $this;
	}

	/**
	 * @param array $messages
	 * @param string $title
	 * @return $this
	 */
	public function warning($messages, $title = null)
	{
		$this->add($this->config->get('bs3-alert.class.warning'), $messages, $title);

		return $this;
	}

	/**
	 * @param array $messages
	 * @param string $title
	 * @return $this
	 */
	public function info($messages, $title = null)
	{
		$this->add($this->config->get('bs3-alert.class.info'), $messages, $title);

		return $this;
	}

	/**
	 * @param string $type
	 * @param array $messages
	 * @param string $title
	 * @return void
	 */
	private function add($type, $messages, $title)
	{
		$this->messages[] = [
			'type' => $type,
			'title' => $title,
			'messages' => $messages
		];

		$this->session->flash($this->sessionName, $this->messages);
	}

}
