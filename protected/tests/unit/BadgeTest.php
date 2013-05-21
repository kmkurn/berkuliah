<?php

class BadgeTest extends CDbTestCase
{
	/**
	 * Tests all badges are valid.
	 */
	public function testValid()
	{
		$badges = Badge::model()->findAll();
		foreach ($badges as $badge)
		{
			$this->assertFileExists(Yii::app()->params['badgeIconsDir'] . $badge->location);
		}
	}
}