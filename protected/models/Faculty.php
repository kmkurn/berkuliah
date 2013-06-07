<?php

/**
 * This is the model class for table "bk_faculty".
 *
 * The followings are the available columns in table 'bk_faculty':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property Student[] $students
 */
class Faculty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Faculty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bk_faculty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(); // no user input for this model
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'courses' => array(self::HAS_MANY, 'Course', 'faculty_id'),
			'students' => array(self::HAS_MANY, 'Student', 'faculty_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
		);
	}
}