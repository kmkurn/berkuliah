<?php

/**
 * This is the model class for table "bk_badge".
 *
 * The followings are the available columns in table 'bk_badge':
 * @property integer $id
 * @property string $name
 * @property string $location
 *
 * The followings are the available model relations:
 * @property Student[] $students
 */
class Badge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Badge the static model class
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
		return 'bk_badge';
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
			'students' => array(self::MANY_MANY, 'Student', 'bk_student_badge(badge_id, student_id)'),
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
			'location' => 'Location',
		);
	}
}