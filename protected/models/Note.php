<?php

/**
 * This is the model class for table "bk_note".
 *
 * The followings are the available columns in table 'bk_note':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property integer $course_id
 * @property integer $student_id
 * @property string $upload_timestamp
 * @property string $edit_timestamp
 *
 * The followings are the available model relations:
 * @property DownloadInfo[] $downloadInfos
 * @property Course $course
 * @property Student $student
 */
class Note extends CActiveRecord
{
	/**
	 * A contant defining the maximum length of $title.
	 */
	const MAX_TITLE_LENGTH = 128;
	/**
	 * A constant defining the maximum allowed file size.
	 */
	const MAX_FILE_SIZE = 512000;

	public $faculty_id;
	public $new_course_name;
	public $file;
	public $raw_file_text;
	public $uploader;

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
			array('title, description', 'required', 'message'=>'{attribute} tidak boleh kosong.'),
			array('title', 'length', 'max'=>self::MAX_TITLE_LENGTH,
				'message'=>'{attribute} maksimum terdiri dari '.self::MAX_TITLE_LENGTH.' karakter.'),

			array('course_id', 'checkCourse', 'on'=>'insert', 'enableClientValidation'=>true, 'clientValidate'=>'clientValidateCourse'),
			array('course_id', 'exist', 'className'=>'Course', 'attributeName'=>'id', 'on'=>'insert',
				'message'=>'{attribute} tidak terdaftar.'),
			array('faculty_id', 'required', 'on'=>'insert', 'message'=>'{attribute} tidak boleh kosong.'),
			array('faculty_id', 'exist', 'className'=>'Faculty', 'attributeName'=>'id', 'on'=>'insert',
				'message'=>'{attribute} tidak terdaftar.'),
			array('new_course_name', 'length', 'max'=>Course::MAX_NAME_LENGTH, 'on'=>'insert',
				'message'=>'{attribute} maksimum terdiri dari '.Course::MAX_NAME_LENGTH.' karakter'),
			array('file', 'checkNote', 'on'=>'insert'),
			array('type, student_id, upload_timestamp, edit_timestamp, raw_file_text', 'safe'),
			
			array('title, type, course_id, faculty_id, uploader', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Validates the course_id field.
	 */
	public function clientValidateCourse()
	{
		$js = 'if (value == 0 && $("#Note_new_course_name").val() == "") messages.push("Mata Kuliah tidak boleh kosong.");';
		return $js;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'downloadInfos' => array(self::HAS_MANY, 'DownloadInfo', 'note_id'),
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'reportCount' => array(self::STAT, 'Student', 'bk_report(note_id, student_id)'),
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
			'edit_timestamp' => 'Terakhir Sunting',
			'faculty_id' => 'Fakultas',
			'file' => 'Berkas',
			'uploader' => 'Oleh',
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

		$criteria->with = array(
			'course.faculty' => array('select' => 'id, name'),
			'student' => array('select' => 'username, name'),
		);

		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type, true);
		$criteria->compare('course_id',$this->course_id, true);
		$criteria->compare('student.username',$this->uploader, true);
		$criteria->compare('student.name',$this->uploader, true, 'OR');
		$criteria->compare('faculty.id',$this->faculty_id,true);
		$criteria->order = 'upload_timestamp DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Inline validators.
	 */

	/**
	 * Checks whether the user has selected the course or insert a new course name.
	 * @param  string $attribute
	 * @param  array $params
	 */
	public function checkCourse($attribute, $params)
	{
		if (empty($this->course_id) && empty($this->new_course_name))
		{
			$attributeName = $this->getAttributeLabel('course_id');
			$this->addError('course_id', $attributeName . ' tidak boleh kosong.');
		}
	}

	/**
	 * Checks whether the uploaded note size less than 500 KB and its type is allowed.
	 * @param  string $attribute
	 * @param  array $params
	 */
	public function checkNote($attribute, $params)
	{
		if (empty($this->raw_file_text))
		{
			$validator = new CFileValidator();
			$validator->attributes = array('file');
			$validator->maxSize = self::MAX_FILE_SIZE;
			$validator->message = '{attribute} tidak boleh kosong.';
			$validator->tooLarge = '{attribute} maksimum ' . Yii::app()->format->size(self::MAX_FILE_SIZE) . '.';
			$validator->wrongType = '{attribute} hanya boleh bertipe PDF atau JPEG';

			$allowedTypes = Note::getAllowedTypes();
			foreach ($allowedTypes as $info)
				$validator->types[] = $info['extension'];
			
			$validator->validate($this);
		}
	}


	/**
	 * Non-static helper functions.
	 */

	/**
	 * Retrieves the icon file name associated with this note type
	 * @return string the icon file name
	 */
	public function getTypeIcon()
	{
		return Yii::app()->params['noteIconsDir'] . $this->extension . '.png';
	}

	/**
	 * Retrieves this model extension.
	 * @return string the extension
	 */
	public function getExtension()
	{
		$allowedTypes = self::getAllowedTypes();

		return $allowedTypes[$this->type]['extension'];
	}

	/**
	 * Updates the download info when a note is downloaded.
	 * @param  integer $studentId the downloading student id
	 * @return boolean whether the update is successful
	 */
	public function downloadedBy($studentId)
	{
		$info = new DownloadInfo();
		$info->setAttributes(array(
			'student_id'=>$studentId,
			'note_id'=>$this->id,
			'timestamp'=>date('Y-m-d H:i:s'),
		));

		return $info->save();
	}

	/**
	 * Retrieves the total rating of this note
	 * @return double the total rating of this note
	 */
	public function getTotalRating()
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('SUM(value) AS ratingSum');
		$cmd->from('bk_rate');
		$cmd->where('note_id=:X', array(':X' => $this->id));

		$res = $cmd->queryRow();
		return $res['ratingSum'];
	}

	/**
	 * Retrieves the rating of this note given by a student
	 * @param int student_id the student id
	 * @return double the rating of this note given by student $student_id
	 */
	public function getRating($student_id)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('value');
		$cmd->from('bk_rate');
		$cmd->where('note_id=:X AND student_id=:Y', array(':X' => $this->id, ':Y' => $student_id));

		$res = $cmd->queryRow();
		return $res['value'];
	}

	/**
	 * Retrieves the number of users that have rated this note
	 * @return int the number of users that have rated this note
	 */
	public function getRatersCount()
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('COUNT(*) AS ratersCount');
		$cmd->from('bk_rate');
		$cmd->where('note_id=:X', array(':X' => $this->id));

		$res = $cmd->queryRow();
		return $res['ratersCount'];
	}

	/**
	 * Rates this note
	 * @param int $student_id the student id giving the rating
	 * @param double rating the rating
	 */
	public function rate($student_id, $rating)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('*');
		$cmd->from('bk_rate');
		$cmd->where('note_id=:X AND student_id=:Y', array(':X' => $this->id, ':Y' => $student_id));
		$res = $cmd->queryRow();

		if ($res)
		{
			$cmd = Yii::app()->db->createCommand();
			$cmd->update('bk_rate', array('value' => $rating, 'timestamp' => date('Y-m-d H:i:s')), 'note_id=:X AND student_id=:Y', array(':X' => $this->id, ':Y' => $student_id));
		}
		else
		{
			$cmd = Yii::app()->db->createCommand();
			$cmd->insert('bk_rate', array('note_id' => $this->id, 'student_id' => $student_id, 'value' => $rating, 'timestamp' => date('Y-m-d H:i:s')));
		}
	}


	/**
	 * Checks whether a student has reported this note
	 * @param int $student_id the student id 
	 * @return boolean whether student $student_id has reported this note
	 */
	public function isReportedBy($student_id)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('*');
		$cmd->from('bk_report');
		$cmd->where('note_id=:X AND student_id=:Y', array(':X' => $this->id, ':Y' => $student_id));
		$res = $cmd->queryRow();

		return $res != NULL;
	}


	/**
	 * Reports this note
	 * @param int $student_id the reporting student id 
	 */
	public function report($student_id)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->insert('bk_report', array('note_id' => $this->id, 'student_id' => $student_id, 'timestamp' => date('Y-m-d H:i:s')));
	}

	/**
	 * Adds a review to this note.
	 * @param Review $review    the review object
	 * @param integer $studentId the reviewer id
	 */
	public function addReview($review, $studentId)
	{
		$review->note_id = $this->id;
		$review->student_id = $studentId;
		$review->timestamp = date('Y-m-d H:i:s');

		return $review->save();
	}

	/**
	 * Event handlers.
	 */

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
				$currentTimestamp = date('Y-m-d H:i:s');
				$this->student_id = Yii::app()->user->id;
				$this->upload_timestamp = $currentTimestamp;
				$this->edit_timestamp = $currentTimestamp;
			}
			else
			{
				$currentTimestamp = date('Y-m-d H:i:s');
				$this->edit_timestamp = $currentTimestamp;
			}
		}
	}

	/**
	 * This method is invoked before saving.
	 * @return boolean whether the saving should be executed
	 */
	public function beforeSave()
	{
		// saves new course
		if (empty($this->course_id))
		{
			$course = new Course();
			$course->name = $this->new_course_name;
			$course->faculty_id = $this->faculty_id;
			$course->save();
			$this->course_id = $course->id;
		}

		return parent::beforeSave();
	}


	/**
	 * Static helper functions.
	 */

	/**
	 * Retrieves the allowed types extension and their text.
	 * @return array the allowed types extension and text
	 */
	public static function getAllowedTypes()
	{
		return array(
			array('extension' => 'pdf', 'name' => 'PDF'),
			array('extension' => 'jpg', 'name' => 'Gambar'),
			array('extension' => 'htm', 'name' => 'Teks'),
		);
	}

	/**
	 * Retrieves the allowed types text.
	 * @return array the allowed types text
	 */
	public static function getTypeNames()
	{
		$allowedTypes = self::getAllowedTypes();
		$res = array();
		foreach ($allowedTypes as $info)
			$res[] = $info['name'];
		return $res;
	}

	/**
	 * Retrieves the type id of a given extension.
	 * @param  string $extension the extension
	 * @return int the type id associated with the extension
	 */
	public static function getTypeFromExtension($extension)
	{
		$allowedTypes = self::getAllowedTypes();
		foreach ($allowedTypes as $id => $info)
		{
			if ($extension === $info['extension'])
			{
				return $id;
			}
		}

		return -1;
	}
}