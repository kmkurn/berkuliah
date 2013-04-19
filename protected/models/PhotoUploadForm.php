<?php

/**
 * This model represents the input form for uploading a photo.
 */
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
			'photo' => 'Ganti Foto',
		);
	}

	/**
	 * Saves the uploaded photo and store its information in DB.
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
		Yii::import('ext.randomness.*');
		$length = 32;
		$fileName = Randomness::randomString($length) . '.' . $this->photo->extensionName;
		$student = Student::model()->findByAttributes(array('photo' => $fileName));
		while ($student !== NULL)
		{
			$fileName = Randomness::randomString($length) . '.' . $this->photo->extensionName;
			$student = Student::model()->findByAttributes(array('photo' => $fileName));
		}

		// save photo
		$this->photo->saveAs('photos/' . $fileName);

		$student = Student::model()->updateByPk(Yii::app()->user->id, array('photo' => $fileName));
	}
}