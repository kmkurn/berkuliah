<?php

/**
 * This is the model class for table "bk_note".
 *
 * The followings are the available columns in table 'bk_note':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property string $location
 * @property integer $course_id
 * @property integer $student_id
 * @property string $upload_timestamp
 * @property string $edit_timestamp
 *
 * The followings are the available model relations:
 * @property Student[] $bkStudents
 * @property Course $course
 * @property Student $student
 */
class Note extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Note the static model class
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
		return 'bk_note';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type, location, course_id, student_id, upload_timestamp', 'required'),
			array('type, course_id, student_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			array('location', 'length', 'max'=>64),
			array('description, edit_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, type, location, course_id, student_id, upload_timestamp, edit_timestamp', 'safe', 'on'=>'search'),
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
			'bkStudents' => array(self::MANY_MANY, 'Student', 'bk_download_info(note_id, student_id)'),
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'type' => 'Type',
			'location' => 'Location',
			'course_id' => 'Course',
			'student_id' => 'Student',
			'upload_timestamp' => 'Upload Timestamp',
			'edit_timestamp' => 'Edit Timestamp',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('upload_timestamp',$this->upload_timestamp,true);
		$criteria->compare('edit_timestamp',$this->edit_timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}