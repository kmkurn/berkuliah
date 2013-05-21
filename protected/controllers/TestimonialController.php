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
				'actions'=>array('propose'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

		$this->render('propose', array(
			'model' => $model,
		));
	}

	/**
	 * Loads the testimonial model.
	 * @param  int $id the testimonial id
	 * @return notethe testimonial object associated with the given id
	 */
	public function loadModel($id)
	{
		$model = Testimonial::model()->findByPk($id);
		if ($model === NULL)
		{
			throw new CHttpException(404, 'Berkas catatan yang dimaksud tidak ada.');
		}

		return $model;
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