<?php

/**
 * This is the model class for table "bk_student".
 *
 * The followings are the available columns in table 'bk_student':
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $bio
 * @property string $photo
 * @property integer $is_admin
 * @property string $last_login_timestamp
 * @property integer $faculty_id
 *
 * The followings are the available model relations:
 * @property DownloadInfo[] $downloadInfos
 * @property Note[] $notes
 * @property Note[] $rates
 * @property Note[] $reports
 * @property Review[] $reviews
 * @property Badge[] $badges
 * @property Testimonial[] $testimonials
 */
class Student extends CActiveRecord
{
	/**
	 * A constant defining the max allowed length of photo filename.
	 */
	const MAX_LENGTH = 64;

	/**
	 * The uploaded profile photo of this student.
	 * @var CUploadedFile
	 */
	public $uploadedPhoto;

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
		return 'bk_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, faculty_id', 'required'),
			array('name', 'length', 'max'=>128),
			array('uploadedPhoto', 'file', 'allowEmpty'=>true, 'maxSize'=>100*1024, 'types'=>'jpg, png'),
			array('faculty_id', 'numerical', 'integerOnly'=>true),
			array('faculty_id', 'exist', 'className'=>'Faculty', 'attributeName'=>'id'),
			array('username, bio, photo, is_admin, last_login_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, photo, is_admin, last_login_timestamp', 'safe', 'on'=>'search'),
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
			'downloadInfos' => array(self::HAS_MANY, 'DownloadInfo', 'student_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'student_id'),
			'rates' => array(self::MANY_MANY, 'Note', 'bk_rate(student_id, note_id)'),
			'reports' => array(self::MANY_MANY, 'Note', 'bk_report(student_id, note_id)'),
			'reviews' => array(self::HAS_MANY, 'Review', 'student_id'),
			'badges' => array(self::MANY_MANY, 'Badge', 'bk_student_badge(student_id, badge_id)'),
			'testimonials' => array(self::HAS_MANY, 'Testimonial', 'student_id'),
			'faculty' => array(self::BELONGS_TO, 'Faculty', 'faculty_id'),
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
			'name' => 'Nama',
			'bio' => 'Bio',
			'uploadedPhoto' => 'Foto Profil',
			'is_admin' => 'Is Admin',
			'last_login_timestamp' => 'Terakhir Masuk',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('is_admin',$this->is_admin);
		$criteria->compare('last_login_timestamp',$this->last_login_timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Saves the profile photo file of this student and set the filename to the photo attribute.
	 * @return Student this model
	 */
	public function store()
	{
		$photo = CUploadedFile::getInstance($this, 'uploadedPhoto');
		if ($photo !== null)
		{
			if ($this->photo !== null)
			{
				unlink('photos/' . $this->photo);
			}
			Yii::import('ext.randomness.*');
			$fileName = Randomness::randomString(self::MAX_LENGTH - strlen($photo->extensionName) - strlen('' + $this->id) - 1);
			$fileName = $fileName . $this->id . '.' . $photo->extensionName;
			$photo->saveAs('photos/' . $fileName);

			$this->photo = $fileName;
		}

		return $this;
	}
}