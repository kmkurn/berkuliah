<?php

/**
 * A class representing the identity of a user.
 * 
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class UserIdentity extends CBaseUserIdentity
{
	/**
	 * Fasilkom UI's LDAP host address.
	 */
	const LDAP_HOST = 'ldap://152.118.29.6';

	/**
	 * Fasilkom UI's LDAP port.
	 */
	const LDAP_PORT = 389;

	/**
	 * Fasilkom UI's LDAP option.
	 */
	const LDAP_OPTION = LDAP_OPT_PROTOCOL_VERSION;

	/**
	 * Fasilkom UI's LDAP option.
	 */
	const LDAP_VALUE = 3;

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
	 * The JUITA username of the user.
	 */
	private $password;

	/**
	 * Constructs a new identity instance.
	 * @param string $username the username of the user
	 */
	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$conn = @ldap_connect(self::LDAP_HOST, self::LDAP_PORT);
		if (!$conn)
		{
			$this->errorMessage = 'Tidak dapat menghubungi LDAP UI.';
			return false;
		}

		$opt = @ldap_set_option($conn, self::LDAP_OPTION, self::LDAP_VALUE);

		$filter = 'uid=' . $this->username;
		$base_dn = 'o=Universitas Indonesia,c=ID';

		$result = @ldap_search($conn, $base_dn, $filter);
		if (!$result)
		{
			ldap_close($conn);
			$this->errorMessage = 'Terjadi kesalahan saat menghubungi LDAP UI.';
			return false;
		}

		$info = ldap_get_entries($conn, $result);
		if ($info['count'] == 0)
		{
			ldap_close($conn);
			$this->errorMessage = 'Username atau password tidak ditemukan';
			return false;
		}

		$dn  = $info[0]["dn"];
		$ret = @ldap_bind($conn, $dn, $this->password);
		
		if (!$ret)
		{
			ldap_close($conn);
			$this->errorMessage = 'Username atau password tidak ditemukan';
			return false;
		}

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