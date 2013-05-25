<?php

/**
 * Event handler for badges.
 */
class CounterEventHandler
{
	/**
	 * Handles new upload event.
	 * @param BkCounterEvent $event the event
	 */
	public function newUpload($event)
	{
		$conditions = $event->conditions();
		foreach ($conditions as $condition)
			$this->checkUploads($event->student, $condition);
	}

	/**
	 * Handles new download event.
	 * @param BkCounterEvent $event the event
	 */
	public function newDownload($event)
	{
		$conditions = $event->conditions();
		foreach ($conditions as $condition)
			$this->checkDownloads($event->student, $condition);
	}

	/**
	 * Checks whether the given student satisfies the given condition for an upload badge.
	 * @param  Student $student the student
	 * @param  array $condition the condition
	 * @return boolean whether the student satisfies the condition
	 */
	public function checkUploads($student, $condition)
	{
		$badge = $condition['badge'];
		$count = $condition['count'];

		if (!$student->hasBadge($badge) && count($student->notes) === $count)
		{
			$student->addBadge($badge);

			$message['text'] = '';
			$message['type'] = 'badge';
			$message['default_text'] = 'Saya baru saja mendapatkan lencana ' . $badge->name . ' pada BerKuliah!';
			$message['name'] = $badge->name;
			$message['link'] = array('site/index');
			$message['picture'] = Yii::app()->params['badgeIconsDir'] . $badge->location;
			$message['caption'] = '10 Unggahan';
			$message['description'] = 'Saya telah mengunggah 10 buah catatan pada BerKuliah';
			Yii::app()->user->addShareMessage($message);

			Yii::app()->user->setFlash('badge', $badge);

			return true;
		}
		
		return false;
	}

	/**
	 * Checks whether the given student satisfies the given condition for a download badge.
	 * @param  Student $student the student
	 * @param  array $condition the condition
	 * @return boolean whether the student satisfies the condition
	 */
	public function checkDownloads($student, $condition)
	{
		$badge = $condition['badge'];
		$count = $condition['count'];

		if (!$student->hasBadge($badge) && count($student->downloadInfos) === $count)
		{
			$student->addBadge($badge);

			$message['text'] = '';
			$message['type'] = 'badge';
			$message['default_text'] = 'Saya baru saja mendapatkan lencana ' . $badge->name . ' pada BerKuliah!';
			$message['name'] = $badge->name;
			$message['link'] = array('site/index');
			$message['picture'] = Yii::app()->params['badgeIconsDir'] . $badge->location;
			$message['caption'] = '10 Unduhan';
			$message['description'] = 'Saya telah mengunduh 10 buah catatan pada BerKuliah';
			Yii::app()->user->addShareMessage($message);

			Yii::app()->user->setFlash('badge', $badge);

			return true;
		}
		
		return false;
	}
}