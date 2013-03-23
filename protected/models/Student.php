<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $photo
 * @property integer $rating
 * @property integer $is_admin
 *
 * The followings are the available model relations:
 * @property Badge[] $badges
 * @property Article[] $articles
 * @property Note[] $notes
 * @property Note[] $notes1
 * @property Note[] $notes2
 * @property Review[] $reviews
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, name, rating, is_admin', 'required'),
			array('rating, is_admin', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>30),
			array('name', 'length', 'max'=>50),
			array('photo', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, name, photo, rating, is_admin', 'safe', 'on'=>'search'),
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
			'badges' => array(self::MANY_MANY, 'Badge', 'achievement(student_id, badge_id)'),
			'articles' => array(self::HAS_MANY, 'Article', 'student_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'student_id'),
			'notes1' => array(self::MANY_MANY, 'Note', 'rate(student_id, note_id)'),
			'notes2' => array(self::MANY_MANY, 'Note', 'report(student_id, note_id)'),
			'reviews' => array(self::HAS_MANY, 'Review', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'name' => 'Name',
			'photo' => 'Photo',
			'rating' => 'Rating',
			'is_admin' => 'Is Admin',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('is_admin',$this->is_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}