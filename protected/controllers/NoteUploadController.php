<?php

class NoteUploadController extends Controller
{
	public function actionIndex()
	{
		$model = new Note();

		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];

			if ( ! $_POST['temp_faculty_id'])
			{
				Yii::app()->user->setFlash('message', 'You must specify faculty.');
				$this->redirect(array('noteUpload/index'));
			}

			if ($model['course_id'] === null && $_POST['new_course'] == null)
			{
				Yii::app()->user->setFlash('message', 'You must specify course.');
				$this->redirect(array('noteUpload/index'));
			}

			if ($model['course_id'] === null)
			{
				$course = new Course();
				$course->name = $_POST['new_course'];
				$course->faculty_id = $_POST['temp_faculty_id'];
				$course->save();

				$model['course_id'] = $course->id;
			}

			$model->student_id = Yii::app()->user->id;
			$model->upload_timestamp = date('Y-m-d H:i:s');

			$model->save();
			
			$file = CUploadedFile::getInstanceByName('file');
			if ($file !== null)
			{
				$ext = $file->extensionName;
				
				if ($ext != 'pdf' && $ext != 'jpg')
				{
					Yii::app()->user->setFlash('message', 'File extension must be PDF or JPG.');
					$this->redirect(array('noteUpload/index'));
				}

				$file->saveAs('notes/' . $model->id . '.' . $ext);
			}
			else
			{
				touch('notes/' . $model->id . '.html');
				file_put_contents('notes/' . $model->id . '.html', $_POST['raw_text']);
			}
			
			$this->redirect(array('home/index'));
		}
		$this->render('index', array('model' => $model));
	}

	public function actionUpdateCourses()
	{
		$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['temp_faculty_id']));
		
		echo CHtml::label('Mata Kuliah', false);
		echo CHtml::dropDownList('Note[course_id]', '',
			CHtml::listData($courses, 'id', 'name'), 
			   array('prompt' => 'Pilih mata kuliah'));

		//echo $form->error($model,'course_id');
	}

	// Uncomment the following methods and override them if needed
}