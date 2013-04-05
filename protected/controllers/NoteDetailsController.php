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
			array('allow', // allow authenticated user to list all files
				'actions'=>array('index', 'download'),
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
		
		$this->render('index', array('model' => $model));
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
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}
}