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
}