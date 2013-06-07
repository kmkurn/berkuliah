<?php

/**
 * A class representing the identity of a user.
 * 
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class UserIdentity extends CBaseUserIdentity
{
	/**
	 * The id of the user.
	 */
	private $id;

	/**
	 * The display name of the user.
	 */
	private $name;

	/**
	 * The JUITA username of the user.
	 */
	private $username;

	/**
	 * Constructs a new identity instance.
	 * @param string $username the username of the user
	 */
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
			$student->photo = Yii::app()->params['defaultProfilePhoto'];
		}
		$student->last_login_timestamp = date('Y-m-d H:i:s');

		$student->save();

		$this->id = $student->id;
		$this->name = $student->name;
		
		$this->setState('isAdmin', $student->is_admin);
		$this->setState('profilePhoto', $student->photo);

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