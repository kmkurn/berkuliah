<?php

/**
 * This is the model class for table "bk_testimonial".
 *
 * The followings are the available columns in table 'bk_testimonial':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $timestamp
 * @property integer $student_id
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class Testimonial extends CActiveRecord
{
	/**
	 * Status of new testimonial.
	 */
	const STATUS_NEW = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Testimonial the static model class
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
		return 'bk_testimonial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('content', 'required'),
			array('status, timestamp, student_id', 'safe'),

			array('id, content, status, timestamp, student_id', 'safe', 'on'=>'search'),
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
			'status' => 'Status',
			'timestamp' => 'Timestamp',
			'student_id' => 'Username Mahasiswa',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('student_id',$this->student_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Grants this testimonial to a student.
	 * @param  Student $student the student
	 * @return boolean whether the grant is successful
	 */
	public function grantTo($student)
	{
		$this->content = 'Silakan isi testimonial Anda di sini.';
		$this->status = self::STATUS_NEW;
		$this->student_id = $student->id;

		return $this->save();
	}

	/**
	 * This method is invoked after validation.
	 */
	public function afterValidate()
	{
		parent::afterValidate();

		if (!$this->hasErrors())
		{
			if ($this->isNewRecord)
			{
				$this->timestamp = date('Y-m-d H:i:s');
			}
		}
	}
}