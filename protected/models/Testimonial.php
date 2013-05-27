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
	const STATUS_NEW = 0;
	const STATUS_PENDING = 1;
	const STATUS_APPROVED = 2;
	const STATUS_REJECTED = 3;

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
			array('content', 'required', 'message'=>'{attribute} tidak boleh kosong.'),
			array('status, timestamp, student_id', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'content' => 'Isi',
			'status' => 'Status',
			'timestamp' => 'Periode',
			'student_id' => 'Oleh',
		);
	}

	/**
	 * Grants this testimonial to a student.
	 * @param  Student $student the student
	 * @return boolean whether the grant is successful
	 */
	public function grantTo($student)
	{
		$this->content = 'Silakan isi testimoni Anda di sini.';
		$this->status = self::STATUS_NEW;
		$this->student_id = $student->id;
		$this->timestamp = date('Y-m-d H:i:s');

		return $this->save();
	}

	/**
	 * Returns the string representation of status
	 * @return string the string representation of status
	 */
	public function getStatusString()
	{
		$repr = self::getStatusMap();
		return $repr[$this->status];
	}

	/**
	 * Approves this testimonial.
	 * @return boolean whether the approval is successful
	 */
	public function approve()
	{
		$this->status = self::STATUS_APPROVED;

		return $this->save();
	}

	/**
	 * Rejects this testimonial.
	 * @return boolean whether the rejection is successful
	 */
	public function reject()
	{
		$this->status = self::STATUS_REJECTED;

		return $this->save();
	}

	/**
	 * Propose this testimonial
	 */
	public function propose()
	{
		$this->status = self::STATUS_PENDING;
		$this->save();
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

	/**
	 * Retrieves the mapping of status and its text.
	 * @return array the mapping
	 */
	public static function getStatusMap()
	{
		return array(
			self::STATUS_NEW => 'Belum Diusulkan',
			self::STATUS_PENDING => 'Menunggu Persetujuan',
			self::STATUS_APPROVED => 'Disetujui',
			self::STATUS_REJECTED => 'Belum Disetujui',
		);
	}

	/**
	 * Retrieves testimonial of the month.
	 * @return Testimonial the testimonial or null if not found
	 */
	public static function getCurrentTestimonial()
	{
		$testimonial = Testimonial::model()->find(array(
			'condition'=>'status=:status',
			'params'=>array(':status'=>self::STATUS_APPROVED),
			'order'=>'timestamp DESC',
		));

		if ($testimonial === null)
			return null;

		$currentMonth = date('m');
		$testimonialMonth = date('m', strtotime($testimonial->timestamp));

		if ($currentMonth !== $testimonialMonth)
			return null;
		else
			return $testimonial;
	}
}