<?php

/**
 * This class represents the persistent state for a user of BerKuliah.
 */
class BkWebUser extends CWebUser
{
	/**
	 * The current number of share messages.
	 */
	public $shareMessagesCnt;


	/**
	 * Adds a share message as a flash message.
	 * @param array $message the message data, as an associative array of the following pairs:
	 * 'text' => The text shown to the user.
	 * 'default_text' => The default text shared by the user.
	 * 'name' => The name of the share message.
	 * 'link' = > The link added to the share message.
	 * 'picture' => The picture of the share message.
	 * 'caption' => The caption of the share message.
	 * 'description' => The description of the share message.
	 * 
	 * @return array access control rules
	 */
	public function addShareMessage($message)
	{
		$idx = $this->shareMessagesCnt;
		$this->shareMessagesCnt++;

		$this->setFlash('share_message' . $idx, $message);
	}

	/**
	 * Checks whether the user has any share messages.
	 * This method is used for some APIs to perform initialization scripts.
	 * @return boolean whether the user has any share messages
	 */
	public function hasShareMessages()
	{
		return $this->hasFlash('share_message0');
	}

	/**
	 * Retrieves the current share messages.
	 * @return boolean the current share messages.
	 */
	public function getShareMessages()
	{
		$messages = array();
		$idx = 0;
		while ($this->hasFlash('share_message' . $idx))
		{
			$messages[] = $this->getFlash('share_message' . $idx, NULL, false);
			$idx++;
		}

		return $messages;
	}

	/**
	 * Sets the notification to be shown to the user.
	 * @param string $type the message type (success, warning, etc.)
	 * @param string $message the message
	 */
	public function setNotification($type, $message)
	{
		$this->setFlash('message', $message);
		$this->setFlash('messageType', $type);
	}

	/**
	 * Retrieves the notification to be shown to the user.
	 * @return string the notification to be shown to the user, or empty string if there is none
	 */
	public function getNotification()
	{
		if ( ! $this->hasFlash('message'))
			return '';

		return
			'<div class="alert alert-' . $this->getFlash('messageType') . '">' .
				$this->getFlash('message') . 
			'</div>';
	}
}