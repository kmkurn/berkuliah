<?php

class NoteController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for viewing note details
			'checkNoteOwner + edit, delete', // check user before editing or deleting a note
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
				'actions'=>array('view', 'edit', 'delete', 'upload', 'download', 'updateCourses'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Views the detailed information of a note.
	 * @param  int $id the note id
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		
		$this->render('view', array(
			'model' => $model, 
		));
	}

	/**
	 * Edits a note.
	 * @param  int $id the note id
	 */
	public function actionEdit($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			if ($model->validate())
			{
				$model->edit_timestamp = date('Y-m-d H:i:s');
				$model->save();
				Yii::app()->user->setFlash('message', 'Perubahan berhasil disimpan.');
				Yii::app()->user->setFlash('messageType', 'success');
				$this->redirect(array('edit', 'id' => $id));
			}
			else
			{
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$this->render('edit', array('model' => $model));
	}

	/**
	 * Deletes a note.
	 * @param  int $id the note id
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		$model->delete();
		// unlink('notes/' . $model->id . '.' . Note::getExtensionFromType($model->type));
		unlink('notes/' . $model->id . '.' . $model->extension);
		
		Yii::app()->user->setFlash('message', 'Berkas berhasil dihapus.');
		Yii::app()->user->setFlash('messageType', 'success');
		$this->redirect(array('home/index'));
	}

	/**
	 * Uploads a note.
	 */
	public function actionUpload()
	{
		$model = new Note();

		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			if ($model->validate())
			{
				$model->saveNewCourse();
				
				$model->attributes = $model->attributes;
				$model->student_id = Yii::app()->user->id;
				$model->upload_timestamp = date('Y-m-d H:i:s');
				$model->setType();

				$model->save();
				$model->store();

				Yii::app()->user->setFlash('message', 'Berkas berhasil diunggah.');
				Yii::app()->user->setFlash('messageType', 'success');
				$this->redirect(array('home/index'));
			}
			else
			{
				$model->faculty_id = NULL;
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$this->render('upload', array(
			'model' => $model,
		));
	}

	/**
	 * Downloads a note.
	 * @param  int $id the note id
	 */
	public function actionDownload($id)
	{
		$model = $this->loadModel($id);

		$this->updateDownloadInfo($id);

		$fileName = $model->id . '.' . $model->extension;
		$filePath = 'notes/' . $fileName;
		$mimeType = NULL;
		if ($model->extension === 'html')
		{
			$mimeType = 'text/html';
		}
		Yii::app()->request->sendFile($model->title, file_get_contents($filePath), $mimeType, false);
	}

	/**
	 * Performs update courses in dropdown list.
	 */
	public function actionUpdateCourses()
	{
		if (isset($_POST['faculty_id']))
		{
			$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['faculty_id']));
			
			echo CHtml::dropDownList('Note[course_id]', '',
				CHtml::listData($courses, 'id', 'name'), 
				   array('prompt' => 'Pilih mata kuliah'));
		}
		else
		{
			throw new CHttpException(400, 'Your request is invalid.');
		}
	}

	/**
	 * Stores the download information.
	 * @param  int $id id of the downloaded note
	 * @return  int the number of affected rows
	 */
	public function updateDownloadInfo($id)
	{
		$model = new DownloadInfo();
		$model->setAttributes(array(
			'student_id' => Yii::app()->user->id,
			'note_id' => $id,
			'timestamp' => date('Y-m-d H:i:s'),
		));

		$model->save();
	}

	/**
	 * Loads the note model.
	 * @param  int $id the note id
	 * @return Note the note object associated with the given id
	 */
	public function loadModel($id)
	{
		$model = Note::model()->findByPk($id);
		if ($model === NULL)
		{
			throw new CHttpException(404, 'Berkas catatan yang dimaksud tidak ada.');
		}

		return $model;
	}

	/**
	 * A filter to assure only the note owner can edit or delete the note.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckNoteOwner($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			if ($model->student_id !== Yii::app()->user->id)
			{
				throw new CHttpException(403, 'Berkas ini bukan milik Anda.');
			}
		}

		$filterChain->run();
	}
}