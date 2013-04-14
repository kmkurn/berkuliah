<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CBaseUserIdentity
{
	private $id;
	private $username;

	public function __construct($username)
	{
		$this->username = $username;
	}

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
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