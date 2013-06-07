<?php

/**
 * A class representing an upload event and its rules.
 *
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 */
class UploadEvent extends BkCounterEvent
{
	/**
	 * ID of each badge in database. Note that these values should exactly match the ID stored in database.
	 */
	const FIRST_ID = 1;
	const BRONZE_ID = 2;
	const SILVER_ID = 3;
	const GOLD_ID = 4;

	/**
	 * The counter rules for each badge.
	 */
	const FIRST_COUNT = 1;
	const BRONZE_COUNT = 5;
	const SILVER_COUNT = 20;
	const GOLD_COUNT = 50;

	/**
	 * The student triggering this event.
	 * @var Student
	 */
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