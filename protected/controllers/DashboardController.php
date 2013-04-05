<?php

class DashboardController extends Controller
{
	public function actionIndex($sid)
	{
		$this->render('index');
	}

	public function actionUploads($sid)
	{
		$dataProvider = new CActiveDataProvider('Note', array(
			'criteria' => array(
				'condition' => 'student_id = :sid',
				'params' => array(':sid' => $sid),
			),
			'pagination' => array(
				'pageSize' => 1,
			),
		));
		$this->render('uploads', array(
			'dataProvider' => $dataProvider,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}