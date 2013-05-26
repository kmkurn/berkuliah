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
	 * Maximum filename length of $photo.
	 */
	const MAX_FILENAME_LENGTH = 64;
	/**
	 * Maximum length of $name.
	 */
	const MAX_NAME_LENGTH = 128;
	/**
	 * Maximum allowed file size for $photo in bytes.
	 */
	const MAX_FILE_SIZE = 102400;

	/**
	 * The to-be-uploaded profile photo file instance
	 */
	public $file;

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
		return array(
			array('name', 'required', 'message'=>'{attribute} tidak boleh kosong.'),
			array('faculty_id', 'required', 'on'=>'update', 'message'=>'{attribute} tidak boleh kosong.'),
			array('name', 'length', 'max'=>self::MAX_NAME_LENGTH,
				'message'=>'{attribute} maksimum terdiri dari '.self::MAX_NAME_LENGTH.' karakter.'
			),
			array('file', 'file', 'allowEmpty'=>true, 'maxSize'=>self::MAX_FILE_SIZE, 'types'=>'jpg, png',
				'tooLarge'=>'{attribute} maksimum '.Yii::app()->format->size(self::MAX_FILE_SIZE).'.',
				'wrongType'=>'{attribute} hanya boleh bertipe JPEG atau PNG',
			),
			array('faculty_id', 'numerical', 'integerOnly'=>true,
				'message'=>'{attribute} tidak valid.'
			),
			array('faculty_id', 'exist', 'className'=>'Faculty', 'attributeName'=>'id',
				'message'=>'{attribute} tidak terdaftar.'
			),
			array('username, bio, photo, is_admin, last_login_timestamp', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'file' => 'Foto',
			'is_admin' => 'Is Admin',
			'last_login_timestamp' => 'Terakhir Masuk',
			'faculty_id' => 'Fakultas',
		);
	}

	/**
	 * Checks whether this student has the given badge.
	 * @param  Badge $badge the badge
	 * @return boolean whether this student has the badge
	 */
	public function hasBadge($badge)
	{
		$badges = $this->badges;
		foreach ($badges as $val)
		{
			if ($val->id === $badge->id)
				return true;
		}

		return false;
	}

	/**
	 * Adds a badge to a student.
	 * @param Badge $badge the badge to be added
	 * @return boolean whether the addition is successful
	 */
	public function addBadge($badge)
	{
		$res = Yii::app()->db->createCommand()
			->insert('bk_student_badge', array(
				'student_id'=>$this->id,
				'badge_id'=>$badge->id,
			));

		return $res > 0;
	}
}