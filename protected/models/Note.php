<?php

/**
 * This is the model class for table "note".
 *
 * The followings are the available columns in table 'note':
 * @property integer $id
 * @property integer $course_id
 * @property integer $student_id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property integer $rating
 * @property string $location
 * @property integer $timestamp
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Course $course
 * @property Student[] $students
 * @property Review[] $reviews
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
		return 'note';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, student_id, title, description, type, rating, location, timestamp', 'required'),
			array('course_id, student_id, type, rating, timestamp', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('location', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, student_id, title, description, type, rating, location, timestamp', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'students' => array(self::MANY_MANY, 'Student', 'report(note_id, student_id)'),
			'reviews' => array(self::HAS_MANY, 'Review', 'note_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'Course',
			'student_id' => 'Student',
			'title' => 'Title',
			'description' => 'Description',
			'type' => 'Type',
			'rating' => 'Rating',
			'location' => 'Location',
			'timestamp' => 'Timestamp',
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('timestamp',$this->timestamp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}