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
			array('allow',
				'actions'=>array('index','profile','uploads', 'uploadPhoto'),
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
		$this->redirect(array('dashboard/profile'));
	}

	/**
	 * List all uploaded files by this user
	 */
	public function actionUploads()
	{
		$dataProvider = new CActiveDataProvider('Note', array(
			'criteria' => array(
				'condition' => 'student_id = :studentId',
				'params' => array(':studentId' => Yii::app()->user->id),
			),
			'pagination' => array(
				'pageSize' => 1,
			),
		));

		$this->render('uploads', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionProfile()
	{
		$student = Student::model()->findByPk(Yii::app()->user->id);
		$downloadsDataProvider = new CArrayDataProvider($student->bkNotes, array(
			'pagination' => array(
				'pageSize' => 1,
			),
		));

		$this->render('profile', array(
			'downloadsDataProvider' => $downloadsDataProvider,
		));
	}

	public function actionUploadPhoto()
	{
		if (isset($_FILES['photo']))
		{
			if (empty($_FILES['photo']['name']))
			{
				Yii::app()->user->setFlash('message', 'You must choose a file.');
				$this->redirect(array('dashboard/uploadPhoto'));
			}

			$photo = CUploadedFile::getInstanceByName('photo');

			if ($photo->extensionName != 'jpg')
			{
				Yii::app()->user->setFlash('message', "You must choose a '.jpg' file.");
				$this->redirect(array('dashboard/uploadPhoto'));
			}
			if ($photo->size > 100 * 1024)
			{
				Yii::app()->user->setFlash('message', 'Your file must not exceed 100 KB');
				$this->redirect(array('dashboard/uploadPhoto'));
			}

			$photo->saveAs('photos/' . Yii::app()->user->id . '.jpg');
			Yii::app()->user->setFlash('message', "Photo successfully uploaded.");
			$this->redirect(array('dashboard/uploadPhoto'));

		}

		$this->render('uploadPhoto');
	}
};