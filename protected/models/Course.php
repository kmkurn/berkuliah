<?php

/**
 * This is the model class for table "bk_course".
 *
 * The followings are the available columns in table 'bk_course':
 * @property integer $id
 * @property string $name
 * @property integer $faculty_id
 *
 * The followings are the available model relations:
 * @property Faculty $faculty
 * @property Note[] $notes
 */
class Course extends CActiveRecord
{
	/**
	 * A constant defining the maximum length of $name.
	 */
	const MAX_NAME_LENGTH = 128;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'bk_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name, faculty_id', 'required'),
			array('faculty_id', 'numerical', 'integerOnly'=>true),
			array('faculty_id', 'exist', 'className'=>'Faculty', 'attributeName'=>'id'),
			array('name', 'length', 'max'=>self::MAX_NAME_LENGTH),

			array('id, name, faculty_id', 'safe', 'on'=>'search'),
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
			'faculty' => array(self::BELONGS_TO, 'Faculty', 'faculty_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nama',
			'faculty_id' => 'Fakultas',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('faculty_id',$this->faculty_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}