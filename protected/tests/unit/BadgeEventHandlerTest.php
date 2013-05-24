<?php

class BadgeEventHandlerTest extends CDbTestCase
{
	public $fixtures = array(
		'students'=>'Student',
	);

	/**
	 * Tests check method in BadgeEventHandler class.
	 */
	public function testCheck()
	{
		$student1 = $this->students('student1');
		$student2 = $this->students('student2');
		$student3 = $this->students('student3');

		$handler = new BadgeEventHandler();
		$badge = Badge::model()->findByPk(1);
		$this->assertTrue($handler->check($student1, array('badge'=>$badge, 'count'=>1)));
		$this->assertFalse($handler->check($student2, array('badge'=>$badge, 'count'=>2)));
		$this->assertFalse($handler->check($student3, array('badge'=>$badge, 'count'=>1)));
	}
}