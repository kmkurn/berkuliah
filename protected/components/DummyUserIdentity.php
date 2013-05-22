<?php

/**
 * DummyUserIdentity represents the data of a dummy user.
 */
class DummyUserIdentity extends CBaseUserIdentity
{
	private $id;
	private $name;

	/**
	 * Authenticates a dummy user.
	 * @return boolean always true.
	 */
	public function authenticate()
	{
		$username = 'dummy.user';
		
		$student = Student::model()->findByAttributes(array('username' => $username));
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

			$student->username = $username;
			$student->name = $username;
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

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}