<?php

class DashboardController extends Controller
{
	public $layout = '//layouts/column2';
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
	 * Redirects to actionProfile()
	 */
	public function actionIndex()
	{
		$student = Student::model()->findByPk(Yii::app()->user->id);
		$downloadsDataProvider = $student->getDownloadHistory();
		$uploadsDataProvider = $student->getUploadList();

		$downloadsDataProvider->setPagination(array(
			'pageSize' => 5,
		));
		$uploadsDataProvider->setPagination(array(
			'pageSize' => 5,
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
				Yii::app()->user->setFlash('message', 'Foto berhasil diunggah.');
			}
		}

		$this->render('uploadPhoto', array(
			'model' => $model,
		));
	}
};