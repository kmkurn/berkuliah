<?php

class PhotoUploadForm extends CFormModel
{
	public $photo;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('photo', 'required'),
			array('photo', 'file', 'types' => 'jpg, png', 'maxSize' => 100 * 1024),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'photo' => 'Foto',
		);
	}

	/**
	 * Save the uploaded photo and store its information in db
	 */
	public function savePhoto()
	{
		// delete old photo
		$student = Student::model()->findByPk(Yii::app()->user->id);
		if ($student->photo !== NULL)
		{
			unlink('photos/' . $student->photo);
		}

		// generate random filename
		$fileName = $this->randomString() . '.' . $this->photo->extensionName;
		$student = Student::model()->findByAttributes(array('photo' => $fileName));
		while ($student !== NULL)
		{
			$fileName = $this->randomString() . '.' . $this->photo->extensionName;
			$student = Student::model()->findByAttributes(array('photo' => $fileName));
		}

		$this->photo->saveAs('photos/' . $fileName);

		$student = Student::model()->updateByPk(Yii::app()->user->id, array('photo' => $fileName));
	}

	/**
	 * Generate random string for filename
	 * @return string the random string
	 */
	private function randomString()
	{
		$length = 32;
		$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
		shuffle($chars);
		$randomString = implode(array_slice($chars, 0, $length));

		return $randomString;
	}
}