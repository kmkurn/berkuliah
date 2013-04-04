<?php

class HomeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'getStudentId + index', // get student id first on advanced search scenario
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Note('search');
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			$dataProvider = $model->search();
		}
		else
		{
			$dataProvider=new CActiveDataProvider('Note');
		}
		$dataProvider->setPagination(array(
			'pageSize' => 100,
		));
		
		$students = Student::model()->findAll();
		$usernames = array();
		foreach ($students as $student)
		{
			$usernames[] = $student->username;
		}

		$this->render('index',array(
			'model' => $model,
			'dataProvider'=>$dataProvider,
			'usernames' => $usernames,
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Note $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='note-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Retrieves student id based on username
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterGetStudentId($filterChain)
	{
		if (isset($_POST['Note']['student_id']))
		{
			$username = $_POST['Note']['student_id'];
			$student = Student::model()->findByAttributes(array('username' => $username));
			if ($student !== NULL)
			{
				$_POST['Note']['student_id'] = $student->id;
			}
		}

		$filterChain->run();
	}
}
