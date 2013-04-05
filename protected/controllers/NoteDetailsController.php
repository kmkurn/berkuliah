<?php

class NoteDetailsController extends Controller
{
	public function actionIndex($id)
	{
		$model = Note::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$this->render('index', array('model' => $model, 
			                         'canEdit' => $model->student_id == Yii::app()->user->id));
	}

	public function actionEdit($id)
	{
		$model = Note::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		if ($model->student_id != Yii::app()->user->id)
			throw new CHttpException(403,'You are not authorized to perform this action.');
		
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			$model->edit_timestamp = date('Y-m-d H:i:s');
			if ($model->save())
				$this->redirect(array('noteDetails/index','id' => $model->id));
		}
		$this->render('edit', array('model' => $model));
	}
	
}