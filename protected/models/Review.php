<?php

/**
 * This is the model class for table "bk_review".
 *
 * The followings are the available columns in table 'bk_review':
 * @property integer $id
 * @property string $content
 * @property string $timestamp
 * @property integer $student_id
 * @property integer $note_id
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Note $note
 */
class Review extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Review the static model class
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
		return 'bk_review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('content', 'required'),
			array('timestamp, student_id, note_id', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'timestamp' => 'Timestamp',
			'student_id' => 'Student',
			'note_id' => 'Note',
		);
	}
}