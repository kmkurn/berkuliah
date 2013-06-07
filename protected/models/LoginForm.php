<?php

/**
 * Login form.
 */
class LoginForm extends CFormModel
{
	/*
	 * The JUITA username
	 */
	public $username;

	/*
	 * The JUITA password
	 */
	public $password;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('username, password', 'required'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
		);
	}
}