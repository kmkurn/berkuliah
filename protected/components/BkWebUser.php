<?php

class BkWebUser extends CWebUser
{
	public $shareMessagesCnt;

	public function addShareMessage($message)
	{
		$idx = $this->shareMessagesCnt;
		$this->shareMessagesCnt++;

		$this->setFlash('share_message' . $idx, $message);
	}

	public function hasShareMessages()
	{
		return $this->hasFlash('share_message0');
	}

	public function getShareMessages()
	{
		$messages = array();
		$idx = 0;
		while ($this->hasFlash('share_message' . $idx))
		{
			$messages[] = $this->getFlash('share_message' . $idx);
			$idx++;
		}

		return $messages;
	}

	public function setNotification($type, $message)
	{
		$this->setFlash('message', $message);
		$this->setFlash('messageType', $type);
	}

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