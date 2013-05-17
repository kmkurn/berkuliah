<?php

class BkWebUser extends CWebUser
{
	public function addShareMessage($text, $name, $picture, $caption, $description)
	{
		$idx = 0;
		if ($this->hasFlash('current_share_message_index'))
		{
			$idx = $this->hasFlash('current_share_message_index') + 1;
			$this->setFlash('current_share_message_index', $idx);
		}

		$this->setFlash('share_message' . $idx, array(
			'text' => $text,
			'name' => $name,
			'picture' => $picture,
			'caption' => $caption,
			'description' => $description)
		);
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