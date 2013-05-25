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
	private $name;

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
		$student = Student::model()->findByAttributes(array('username' => $this->username));
		if ($student === null)
		{
			$student = new Student();
			$student->username = $this->username;
			$student->name = $this->username;
		}
		$student->last_login_timestamp = date('Y-m-d H:i:s');

		$student->save();

		$this->id = $student->id;
		$this->name = $student->name;
		
		$this->setState('isAdmin', $student->is_admin);
		
		if ($student->photo)
			$this->setState('profilePhoto', $student->photo);
		else
			$this->setState('profilePhoto', Yii::app()->params['defaultProfilePhoto']);

		return true;
	}

	/**
	 * Retrieves the unique identifier of the user. In this case, its ID.
	 * @return integer the user id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Retrieves the display name of the user.
	 * @return string the display name
	 */
	public function getName()
	{
		return $this->name;
	}
}