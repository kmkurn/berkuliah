<?php

class NoteUploadController extends Controller
{
	public function actionIndex()
	{
		$model = new Note();

		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			$model->student_id = Yii::app()->user->id;
			$file = CUploadedFile::getInstanceByName('file');
			if($model->save())
			{
				if ($file !== null)
				{
					$ext = $file->extensionName;
					
					if ($ext != 'pdf' && $ext != 'jpg')
					{
						Yii::app()->user->setFlash('error', 'File extension must be PDF or JPG.');
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
		}
		$this->render('index', array('model' => $model));
	}

	// Uncomment the following methods and override them if needed
}