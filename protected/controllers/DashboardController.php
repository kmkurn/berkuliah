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
				'actions'=>array('index','profile','uploads'),
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
}