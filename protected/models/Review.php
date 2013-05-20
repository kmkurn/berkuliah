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

			array('id, content, timestamp, student_id, note_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('note_id',$this->note_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}