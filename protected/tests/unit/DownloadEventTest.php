<?php

class DownloadEventTest extends CTestCase
{
	/**
	 * Tests get mappings.
	 */
	public function testGetMappings()
	{
		$event = new DownloadEvent();
		$mappings = $event->getMappings();
		$this->assertEquals(3, count($mappings));
		$this->assertTrue(in_array(DownloadEvent::BRONZE_COUNT, $mappings));
		$this->assertTrue(in_array(DownloadEvent::SILVER_COUNT, $mappings));
		$this->assertTrue(in_array(DownloadEvent::GOLD_COUNT, $mappings));
	}
}