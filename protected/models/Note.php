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
	 * Constants that define note type/extension
	 */
	const TYPE_PDF = 0;
	const TYPE_JPG = 1;
	const TYPE_TXT = 2;
	
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
			array('title', 'required'),
			array('title', 'length', 'max'=>128),
			array('course_id, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, description, type, course_id, student_id, upload_timestamp, edit_timestamp', 'safe', 'on'=>'search'),
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
			'title' => 'Judul',
			'description' => 'Deskripsi',
			'type' => 'Jenis',
			'location' => 'Lokasi',
			'course_id' => 'Mata Kuliah',
			'student_id' => 'Oleh',
			'upload_timestamp' => 'Waktu Unggah',
			'edit_timestamp' => 'Waktu Sunting',
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

		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('upload_timestamp',$this->upload_timestamp,true);
		$criteria->compare('edit_timestamp',$this->edit_timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Update the note edit timestamp to current time
	 */
	public function updateEditTimestamp()
	{
		$this->edit_timestamp = date('Y-m-d H:i:s');
	}

	/**
	 * Retrieves an array of all valid types of a note
	 * @return array the array of types
	 */
	public function getTypeOptions()
	{
		return array(
			self::TYPE_PDF => 'PDF',
			self::TYPE_JPG => 'Gambar',
			self::TYPE_TXT => 'Teks',
		);
	}

	/**
	 * Retrieves the text for this model type
	 * @return string the text for this model type
	 */
	public function getTypeText()
	{
		$typeOptions = $this->getTypeOptions();
		if (isset($typeOptions[$this->type]))
		{
			return $typeOptions[$this->type];
		}
		else
		{
			return 'Jenis tidak diketahui';
		}
	}

	public function getDownloadTimestamp($studentId)
	{
		$sql = "SELECT timestamp FROM bk_download_info WHERE student_id=:studentId AND note_id=:noteId;";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(':studentId', $studentId, PDO::PARAM_INT);
		$command->bindValue(':noteId', $this->id, PDO::PARAM_INT);
		$result = $command->queryRow();
		return $result['timestamp'];
	}

	/**
	 * Retrieves an array of all valid extensions of a note
	 * @return array the array of extensions
	 */
	public static function getValidExtensions()
	{
		return array(
			self::TYPE_PDF => 'pdf',
			self::TYPE_JPG => 'jpg',
			self::TYPE_TXT => 'html',
		);
	}

	public static function isExtensionAllowed($extension)
	{
		$validExtensions = self::getValidExtensions();

		return in_array($extension, $validExtensions);
	}

	public static function getTypeFromExtension($extension)
	{
		$validExtensions = self::getValidExtensions();
		foreach ($validExtensions as $id => $ext)
		{
			if ($extension === $ext)
			{
				return $id;
			}
		}

		return -1;
	}

	public static function getExtensionFromType($type)
	{
		$validExtensions = self::getValidExtensions();

		return $validExtensions[$type];
	}
}