<?php

/**
 * This is the model class for table "akses_info".
 *
 * The followings are the available columns in table 'bk_badge':
 * @property integer $id
 * @property integer $note_id
 * @property timestamp $timestamp
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Note $note
 */
class AksesInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AksesInfo the static model class
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
		return 'bk_akses_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		//return array(); // no user input for this model
		return array(
			array('student_id, note_id, timestamp', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		/*
		return array(
			'students' => array(self::MANY_MANY, 'Student', 'bk_student_badge(badge_id, student_id)'),
		);
		*/
		return array(
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'note' => array(self::BELONGS_TO, 'Note', 'note_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		/*
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'location' => 'Location',
		);
		*/
		return array(
			'id' => 'ID',
			'student_id' => 'Student',
			'note_id' => 'Note',
			'timestamp' => 'Timestamp',
		);
	}
}