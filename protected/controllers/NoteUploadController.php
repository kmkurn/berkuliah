<?php

class NoteUploadController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
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
				'actions'=>array('index', 'updateCourses'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Uploads a note.
	 */
	public function actionIndex()
	{
		$model = new NoteUploadForm();

		if (isset($_POST['NoteUploadForm']))
		{
			$model->attributes = $_POST['NoteUploadForm'];
			if ($model->validate())
			{
				$model->saveNewCourse();
				$note = new Note();
				$note->attributes = $model->attributes;
				$note->student_id = Yii::app()->user->id;
				$note->upload_timestamp = date('Y-m-d H:i:s');
				$note->type = $model->getNoteType();

				$note->save();

				$model->saveNote($note->id);

				Yii::app()->user->setFlash('message', 'Berkas berhasil diunggah.');
				Yii::app()->user->setFlash('messageType', 'success');
				$this->redirect(array('home/index'));
			}
			else
			{
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}
		$this->render('index', array('model' => $model));
	}

	/**
	 * Performs update courses in dropdown list.
	 */
	public function actionUpdateCourses()
	{
		if (isset($_POST['faculty_id']))
		{
			$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['faculty_id']));
			
			echo CHtml::dropDownList('NoteUploadForm[course_id]', '',
				CHtml::listData($courses, 'id', 'name'), 
				   array('prompt' => 'Pilih mata kuliah'));
		}
		else
		{
			throw new CHttpException(400, 'Your request is invalid.');
		}
	}
}