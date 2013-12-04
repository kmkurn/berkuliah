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
	public function authenticate($type=null)
	{
                $former_username = $this->username;
                if ($type == "social") $this->username = 'f-' . $this->username;
		$student = Student::model()->findByAttributes(array('username' => $this->username));
		if ($student === null)
		{
			$student = new Student();
			$student->username = $this->username;
			$student->name = ($type == 'social') ? $this->username : self::humanize($former_username);
			$student->photo = Yii::app()->params['defaultProfilePhoto'];
			$student->faculty_id = 1;
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

	/**
	 * Humanize username.
	 * @param string $username the username
	 * @return string the human-readable username
	 */
	public static function humanize($username)
	{
		$names = explode('.', $username);
		$res = array();
		foreach ($names as $name)
		{
			$n = strlen($name);
			while (is_numeric($name[$n - 1]))
				$n--;
			$res[] = substr($name, 0, $n);
		}
		return ucwords(implode(' ', $res));
	}
}
