<?php

class HomeController extends Controller
{
	public function actionBatchdelete()
	{
		$this->render('batchdelete');
	}

	public function actionIndex($page = 0)
	{
		$model = new SearchForm;
		$this->render('index', array('model' => $model));

		if (isset($_POST['SearchForm']))
		{
			$model->attributes = $_POST['SearchForm'];

			if ($model->validate())
			{
				$criteria = new CDbCriteria;
				$criteria->condition = 'title LIKE "%'. $model->keyword .'%"';
				$criteria->limit = 10;
				$criteria->offset = $page * 10;
				$notes = Note::model()->findAll($criteria);
			}
		}
		else
		{
			$criteria = new CDbCriteria;
			$criteria->limit = 10;
			$criteria->offset = $page * 10;
			$notes = Note::model()->findAll($criteria);
		}

		foreach ($notes as $note)
		{
			echo $note->title . '<br />';
		}
	}
	
}