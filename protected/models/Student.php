<?php

/**
 * This is the model class for table "bk_student".
 *
 * The followings are the available columns in table 'bk_student':
 * @property integer $id
 * @property string $username
 * @property string $photo
 * @property integer $is_admin
 * @property string $last_login_timestamp
 *
 * The followings are the available model relations:
 * @property Note[] $bkNotes
 * @property Note[] $notes
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
			array('username', 'required'),
			array('is_admin', 'numerical', 'integerOnly'=>true),
			array('username, photo', 'length', 'max'=>64),
			array('last_login_timestamp', 'safe'),
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
			'downloads' => array(self::MANY_MANY, 'Note', 'bk_download_info(student_id, note_id)'),
			'notes' => array(self::HAS_MANY, 'Note', 'student_id'),
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
			'photo' => 'Photo',
			'is_admin' => 'Is Admin',
			'last_login_timestamp' => 'Last Login Timestamp',
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
	 * Retrieves download history of this user.
	 * @return CArrayDataProvider the download history
	 */
	public function getDownloadHistory()
	{
		$dataProvider = new CArrayDataProvider($this->downloads);

		return $dataProvider;
	}

	/**
	 * Retrieves list of files uploaded by this user.
	 * @return CActiveDataProvider the list of files
	 */
	public function getUploadList()
	{
		$dataProvider = new CActiveDataProvider('Note', array(
			'criteria' => array(
				'condition' => 'student_id=:studentId',
				'params' => array(':studentId' => $this->id),
			),
		));

		return $dataProvider;
	}
}