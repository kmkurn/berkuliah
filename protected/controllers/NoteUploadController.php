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
				$this->redirect(array('home/index'));
			}
		}
		$this->render('index', array('model' => $model));
	}

	public function actionUpdateCourses()
	{
		$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['faculty_id']));
		
		echo CHtml::label('Mata Kuliah', false);
		echo CHtml::dropDownList('NoteUploadForm[course_id]', '',
			CHtml::listData($courses, 'id', 'name'), 
			   array('prompt' => 'Pilih mata kuliah'));
	}
}