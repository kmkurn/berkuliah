<?php

/**
 * DummyUserIdentity represents the data of a dummy user.
 */
class DummyUserIdentity extends CBaseUserIdentity
{
	private $id;

	/**
	 * Authenticates a dummy user.
	 * @return boolean always true.
	 */
	public function authenticate()
	{
		$username = 'dummy.user';
		
		$student = Student::model()->findByAttributes(array('username' => $username));
		if (! $student)
		{
			$student = new Student();
			$student->username = $username;
		}
		$student->last_login_timestamp = date('Y-m-d H:i:s');

		$student->save();

		$this->id = $student->id;
		$this->setState('username', $username);
		$this->setState('is_admin', $student->is_admin);
		$this->setState('photo', $student->photo);

		return true;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->getState('username');
	}
}