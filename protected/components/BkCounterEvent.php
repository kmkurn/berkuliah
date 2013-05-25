<?php

/**
 * An abstract class representing counter events which will be handled by {@link CounterEventHandler}.
 *
 * @author Kemal Maulana Kurniawan <kemskems12@gmail.com>
 */
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