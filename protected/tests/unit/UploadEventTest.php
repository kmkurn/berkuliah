<?php

class UploadEventTest extends CTestCase
{
	/**
	 * Tests get mappings.
	 */
	public function testGetMappings()
	{
		$event = new UploadEvent();
		$mappings = $event->getMappings();
		$this->assertEquals(4, count($mappings));
		$this->assertTrue(in_array(UploadEvent::BRONZE_COUNT, $mappings));
		$this->assertTrue(in_array(UploadEvent::SILVER_COUNT, $mappings));
		$this->assertTrue(in_array(UploadEvent::GOLD_COUNT, $mappings));
	}
}