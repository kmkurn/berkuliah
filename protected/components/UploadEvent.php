<?php

class UploadEvent extends CEvent
{
	const BRONZE_ID = 1;
	const SILVER_ID = 2;
	const GOLD_ID = 3;

	const BRONZE_COUNT = 5;
	const SILVER_COUNT = 20;
	const GOLD_COUNT = 50;

	public $student;

	/**
	 * Retrieves the condition of a given name.
	 * @param  string $name the condition name
	 * @return array the condition
	 */
	public static function getCondition($name)
	{
		$conditions = self::conditions();

		return $conditions[$name];
	}

	/**
	 * Retrieves all conditions.
	 * @return array the conditions
	 */
	public static function conditions()
	{
		return array(
			'bronze'=>array(
				'badge'=>Badge::model()->findByPk(self::BRONZE_ID),
				'count'=>self::BRONZE_COUNT,
			),
			'silver'=>array(
				'badge'=>Badge::model()->findByPk(self::SILVER_ID),
				'count'=>self::SILVER_COUNT,
			),
			'gold'=>array(
				'badge'=>Badge::model()->findByPk(self::GOLD_ID),
				'count'=>self::GOLD_COUNT,
			),
		);
	}
}