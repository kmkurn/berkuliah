<?php

/**
 * A class representing the /home/ pages in the application.
 */
class HomeController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control
			'ajaxOnly + updateCourses',
			'postOnly + batchDelete',
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
				'actions'=>array('index', 'batchDelete', 'updateCourses'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	/**
	 * Lists all notes.
	 */
	public function actionIndex()
	{
		$model = new Note('search');
		if (isset($_GET['Note']))
		{
			$model->attributes = $_GET['Note'];
			$dataProvider = $model->search();
		}
		else
		{
			$dataProvider=new CActiveDataProvider('Note', array(
				'criteria' => array(
					'order' => 'upload_timestamp DESC',
				),
			));
		}
		$dataProvider->setPagination(array(
			'pageSize' => 16,
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
	 * Deletes notes in batch mode.
	 */
	public function actionBatchDelete()
	{
		if (isset($_POST['deleteNote']))
		{
			foreach ($_POST['deleteNote'] as $id => $value)
			{
				$model = Note::model()->findByPk($id);
				$model->delete();
				unlink(Yii::app()->params['notesDir'] . $model->id . '.' . $model->extension);
			}

			Yii::app()->user->setNotification('success', 'Berkas-berkas berhasil dihapus.');
		}
		$this->redirect(array('index'));
	}

	/**
	 * Performs update courses in dropdown list.
	 */
	public function actionUpdateCourses()
	{
		$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['faculty_id']));
		
		echo CHtml::label('Mata Kuliah', false);
		echo CHtml::dropDownList('Note[course_id]', '',
			CHtml::listData($courses, 'id', 'name'), 
			   array('prompt' => '(semua)'));
	}
}
