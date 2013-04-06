<?php

class NoteDetailsController extends Controller
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
				'actions'=>array('index', 'edit', 'delete', 'download'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * View the detailed information of a note
	 * @param  int $id the note id
	 */
	public function actionIndex($id)
	{
		$model = $this->loadModel($id);
		
		$this->render('index', array(
			'model' => $model, 
		));
	}

	/**
	 * Edit a note
	 * @param  int $id the note id
	 */
	public function actionEdit($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			$model->updateEditTimestamp();
			if ($model->save())
			{
				Yii::app()->user->setFlash('message', 'Perubahan berhasil disimpan.');
			}
		}

		$this->render('edit', array(
			'model' => $model,
		));
	}

	/**
	 * Delete a note
	 * @param  int $id the note id
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		$model->delete();
		unlink('notes/' . $model->id . '.' . Note::getExtensionFromType($model->type));
		
		Yii::app()->user->setFlash('message', 'Berkas berhasil dihapus.');
		$this->redirect(array('home/index'));
	}

	/**
	 * Download a note
	 * @param  int $id the note id
	 */
	public function actionDownload($id)
	{
		$model = $this->loadModel($id);

		$this->updateDownloadInfo($id);

		$fileName = $model->id . '.' . Note::getExtensionFromType($model->type);
		$filePath = 'notes/' . $fileName;
		CHttpRequest::sendFile($model->title, file_get_contents($filePath), NULL, false);
	}

	/**
	 * Store the download information
	 * @param  int $id id of the downloaded note
	 * @return  int the number of affected rows
	 */
	public function updateDownloadInfo($id)
	{
		$sql = "INSERT INTO bk_download_info (student_id, note_id, timestamp) VALUES (:studentId, :noteId, :timestamp);";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(':studentId', Yii::app()->user->id, PDO::PARAM_INT);
		$command->bindValue(':noteId', $id, PDO::PARAM_INT);
		$command->bindValue(':timestamp', date('Y-m-d H:i:s'), PDO::PARAM_STR);

		return $command->execute();
	}

	/**
	 * Load the note model
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
	 * Filter to assure only the note owner can edit or delete the note
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