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
			'checkNoteOwner + edit, delete'
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
				'actions'=>array('index', 'download', 'edit', 'delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	public function actionIndex($id)
	{
		$model = $this->loadModel($id);
		
		$this->render('index', array('model' => $model, 
			                         'canEdit' => $model->student_id == Yii::app()->user->id));
	}

	public function actionEdit($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			$model->edit_timestamp = date('Y-m-d H:i:s');
			if ($model->save())
				$this->redirect(array('noteDetails/index','id' => $model->id));
		}
		$this->render('edit', array('model' => $model));
	}

	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$model->delete();
		unlink('notes/' . $model->id . '.' . Note::getExtensionFromType($model->type));
		
		Yii::app()->user->setFlash('message', 'Berkas berhasil dihapus.');
		$this->redirect(array('home/index'));
	}

	public function actionDownload($id)
	{
		$model = $this->loadModel($id);

		$this->updateDownloadInfo($id);

		$fileName = $model->id . '.' . Note::getExtensionFromType($model->type);
		$filePath = 'notes/' . $fileName;
		CHttpRequest::sendFile($model->title, file_get_contents($filePath), NULL, false);
	}

	public function updateDownloadInfo($id)
	{
		$sql = "INSERT INTO bk_download_info (student_id, note_id, timestamp) VALUES (:studentId, :noteId, :timestamp);";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(':studentId', Yii::app()->user->id, PDO::PARAM_INT);
		$command->bindValue(':noteId', $id, PDO::PARAM_INT);
		$command->bindValue(':timestamp', date('Y-m-d H:i:s'), PDO::PARAM_STR);

		return $command->execute();
	}

	public function loadModel($id)
	{
		$model = Note::model()->findByPk($id);
		if ($model === NULL)
			throw new CHttpException(404,'Berkas catatan yang dimaksud tidak ada.');

		return $model;
	}

	public function filterCheckNoteOwner($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			if ($model->student_id != Yii::app()->user->id)
				throw new CHttpException(403, 'Berkas ini bukan milik Anda.');
			$filterChain->run();
		}
		else
			throw new CHttpException(404,'Berkas catatan belum dinyatakan.');
	}
}