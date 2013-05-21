<?php

class TestimonialController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for viewing articles details
			'checkTestimonialOwner + propose', // check user before proposing a testimonial
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user
				'actions'=>array('propose', 'view'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{   
		$model = $this->loadModel($id);
		$this->render('_view', array(
			'model' => $model,
		));		
	}
/**
	 * Loads the note model.
	 * @param  int $id the note id
	 * @return Note the note object associated with the given id
	 */
	public function loadModel($id)
	{
		$model = Testimonial::model()->findByPk($id);
		if ($model === NULL)
		{
			throw new CHttpException(404, 'Testimonial yang dimaksud tidak ada.');
		}

		return $model;
	}
	
	/**
	 * Propose a testimonial.
	 */
	public function actionPropose()
	{
		$model = new Testimonial();

		if (isset($_POST['Testimonial']))
		{
			$model->attributes = $_POST['Testimonial'];
			if ($model->validate())
			{
				$model->save(false);				
				$this->redirect(array('home/index'));
			}
			
		}
		

		$this->render('view', array(
			'model' => $model,
		));
	}


	public function filterCheckTestimonialOwner($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			if ($model->student_id !== Yii::app()->user->id)
			{
				throw new CHttpException(403, 'Artikel ini bukan milik Anda.');
			}
		}

		$filterChain->run();
	}	
}