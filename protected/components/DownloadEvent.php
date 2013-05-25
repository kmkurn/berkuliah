<?php

class DownloadEvent extends BkCounterEvent
{
	const FIRST_ID = 5;
	const BRONZE_ID = 6;
	const SILVER_ID = 7;
	const GOLD_ID = 8;

	const FIRST_COUNT = 1;
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
			self::FIRST_ID=>self::FIRST_COUNT,
			self::BRONZE_ID=>self::BRONZE_COUNT,
			self::SILVER_ID=>self::SILVER_COUNT,
			self::GOLD_ID=>self::GOLD_COUNT,
		);
	}
}