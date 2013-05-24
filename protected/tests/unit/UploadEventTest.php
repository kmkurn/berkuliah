<?php

class UploadEventTest extends CTestCase
{
	/**
	 * Tests conditions() method in UploadEvent class.
	 */
	public function testConditions()
	{
		$conditions = UploadEvent::conditions();

		$this->assertEquals(3, count($conditions));
		$this->assertTrue(in_array(array(
			'badge'=>Badge::model()->findByPk(UploadEvent::BRONZE_ID),
			'count'=>UploadEvent::BRONZE_COUNT,
		), $conditions));
		$this->assertTrue(in_array(array(
			'badge'=>Badge::model()->findByPk(UploadEvent::SILVER_ID),
			'count'=>UploadEvent::SILVER_COUNT,
		), $conditions));
		$this->assertTrue(in_array(array(
			'badge'=>Badge::model()->findByPk(UploadEvent::GOLD_ID),
			'count'=>UploadEvent::GOLD_COUNT,
		), $conditions));
	}

	/**
	 * Tests getCondition() method in UploadEvent class.
	 */
	public function testGetCondition()
	{
		$cond = UploadEvent::getCondition('bronze');
		$this->assertEquals(2, count($cond));
		$this->assertEquals(Badge::model()->findByPk(UploadEvent::BRONZE_ID), $cond['badge']);
		$this->assertEquals(UploadEvent::BRONZE_COUNT, $cond['count']);

		$cond = UploadEvent::getCondition('silver');
		$this->assertEquals(2, count($cond));
		$this->assertEquals(Badge::model()->findByPk(UploadEvent::SILVER_ID), $cond['badge']);
		$this->assertEquals(UploadEvent::SILVER_COUNT, $cond['count']);

		$cond = UploadEvent::getCondition('gold');
		$this->assertEquals(2, count($cond));
		$this->assertEquals(Badge::model()->findByPk(UploadEvent::GOLD_ID), $cond['badge']);
		$this->assertEquals(UploadEvent::GOLD_COUNT, $cond['count']);
	}
}