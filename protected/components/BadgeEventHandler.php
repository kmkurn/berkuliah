<?php

/**
 * Event handler for badges.
 */
class BadgeEventHandler
{
	/**
	 * Handles new upload event.
	 * @param UploadEvent $event the event
	 */
	public function newUpload($event)
	{
		$conditions = UploadEvent::conditions();
		foreach ($conditions as $condition)
			$this->check($event->student, $condition);
	}

	/**
	 * Checks whether the given student satisfies the given condition for a badge.
	 * @param  Student $student the student
	 * @param  array $condition the condition
	 * @return boolean whether the student satisfies the condition
	 */
	public function check($student, $condition)
	{
		$badge = $condition['badge'];
		$count = $condition['count'];

		if (!$student->hasBadge($badge) && count($student->notes) === $count)
		{
			$student->addBadge($badge);
			Yii::app()->user->setFlash('badge', $badge);

			return true;
		}
		
		return false;
	}
}