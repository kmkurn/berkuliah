<?php

/**
 * A class representing the identity of a dummy user.
 * 
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class DummyUserIdentity extends CBaseUserIdentity
{
	/**
	 * The id of the dummy user.
	 */
	private $id;

	/**
	 * The display name of the dummy user.
	 */
	private $name;

	/**
	 * The username of the dummy user.
	 */
	private $username;

	/**
	 * Whether the dummy user is an admin.
	 */
	private $isAdmin;


	/**
	 * Constructs a new identity instance.
	 * @param boolean $isAdmin whether the dummy user is an admin.
	 */
	public function __construct($isAdmin)
	{
		$this->isAdmin = $isAdmin;
		if ($isAdmin)
		{
			$this->username = 'dummy.admin';
			$this->name = 'Dummy Admin';
		}
		else
		{
			$this->username = 'dummy.user';
			$this->name = 'Dummy User';
		}
	}

	/**
	 * Authenticates a dummy user.
	 * @return boolean always true.
	 */
	public function authenticate()
	{
		$student = Student::model()->findByAttributes(array('username' => $this->username));
		if ($student === null)
		{
			$student = new Student();
			$faculty = Faculty::model()->findByPk(1);
			if ($faculty === null)
			{
				$faculty = new Faculty();
				$faculty->id = 1;
				$faculty->name = 'Dummy Faculty';
				$faculty->save(false);
			}

			$student->username = $this->username;
			$student->name = $this->name;
			$student->is_admin = $this->isAdmin;
			$student->faculty_id = $faculty->id;
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