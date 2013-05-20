<?php

class ArticleGrantForm extends CFormModel
{
	public $username;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('username', 'required'),
			array('username', 'length', 'max'=>32),
			array('username', 'checkUsername'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
		);
	}

	/**
	 * Checks whether the username exists
	 * @param  string $attribute
	 * @param  array $params
	 */
	public function checkUsername($attribute, $params)
	{
		if ( ! Student::model()->find('username=:X', array(':X' => $this->username)))
			$this->addError('username', 'Username tidak ditemukan.');
	}
}