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
 * @property DownloadInfo[] $downloadInfos
 * @property Course $course
 * @property Student $student
 */
class Note extends CActiveRecord
{
	public $advanced_faculty_id;

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
			array('title, description, type, course_id, student_id, upload_timestamp, edit_timestamp, advanced_faculty_id', 'safe', 'on'=>'search'),
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
			'downloadInfos' => array(self::HAS_MANY, 'DownloadInfo', 'note_id'),
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
			'edit_timestamp' => 'Terakhir Sunting',
			'advanced_faculty_id' => 'Fakultas',
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
		);

		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type, true);
		$criteria->compare('course_id',$this->course_id, true);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('upload_timestamp',$this->upload_timestamp,true);
		$criteria->compare('edit_timestamp',$this->edit_timestamp,true);
		$criteria->compare('faculty.id',$this->advanced_faculty_id,true);
		$criteria->order = 'upload_timestamp DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves the icon file name associated with this note type
	 * @return string the icon file name
	 */
	public function getTypeIcon()
	{
		return Yii::app()->baseUrl . '/images/' . $this->extension . '.svg';
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
	 * Retrieves the allowed types extension and their text.
	 * @return array the allowed types extension and text
	 */
	public static function getAllowedTypes()
	{
		return array(
			array('extension' => 'pdf', 'name' => 'PDF'),
			array('extension' => 'jpg', 'name' => 'Gambar'),
			array('extension' => 'html', 'name' => 'Teks'),
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