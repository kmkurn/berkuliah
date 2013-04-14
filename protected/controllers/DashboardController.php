<?php

class DashboardController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for dashboard operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user
				'actions'=>array('index', 'uploadPhoto'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays this user's history.
	 */
	public function actionIndex()
	{
		$downloadsDataProvider = new CActiveDataProvider('DownloadInfo', array(
			'criteria' => array(
				'condition' => 'student_id=:studentId',
				'params' => array(
					':studentId' => Yii::app()->user->id,
				),
			),
			'pagination' => array(
				'pageSize' => 5,
			),
		));

		$uploadsDataProvider = new CActiveDataProvider('Note', array(
			'criteria' => array(
				'condition' => 'student_id=:studentId',
				'params' => array(
					':studentId' => Yii::app()->user->id,
				),
			),
			'pagination' => array(
				'pageSize' => 5,
			),
		));

		$this->render('index', array(
			'downloadsDataProvider' => $downloadsDataProvider,
			'uploadsDataProvider' => $uploadsDataProvider,
		));
	}

	/**
	 * Uploads a new profile photo.
	 */
	public function actionUploadPhoto()
	{
		$model = new PhotoUploadForm();


		if (isset($_POST['PhotoUploadForm']))
		{
			$model->photo = CUploadedFile::getInstance($model, 'photo');
			if ($model->validate())
			{
				$model->savePhoto();
				$student = Student::model()->findByPk(Yii::app()->user->id);
				Yii::app()->user->setState('photo', $student->photo);
				Yii::app()->user->setFlash('message', 'Foto berhasil diunggah.');
				Yii::app()->user->setFlash('messageType', 'success');
			}
			else
			{
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$myPhoto = Student::model()->findByPk(Yii::app()->user->id);

		$this->render('uploadPhoto', array(
			'model' => $model,
			'photo' => $myPhoto->photo,
		));
	}
}