<?php

abstract class BkCounterEvent extends CEvent
{
	/**
	 * Returns the mappings between badge id and its counter condition.
	 * @return array the mappings
	 */
	abstract public function getMappings();

	/**
	 * Retrieves all conditions.
	 * @return array the conditions
	 */
	public function conditions()
	{
		$mapping = $this->getMappings();
		$conditions = array();

		foreach ($mapping as $id => $count)
			$conditions[] = array('badge'=>Badge::model()->findByPk($id), 'count'=>$count);

		return $conditions;
	}
}