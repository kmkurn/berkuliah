<?php

class DownloadEvent extends BkCounterEvent
{
	const BRONZE_ID = 4;
	const SILVER_ID = 5;
	const GOLD_ID = 6;

	const BRONZE_COUNT = 5;
	const SILVER_COUNT = 20;
	const GOLD_COUNT = 50;

	public $student;

	/**
	 * Returns the mappings for this event.
	 * @return array the mappings
	 */
	public function getMappings()
	{
		return array(
			self::BRONZE_ID=>self::BRONZE_COUNT,
			self::SILVER_ID=>self::SILVER_COUNT,
			self::GOLD_ID=>self::GOLD_COUNT,
		);
	}
}