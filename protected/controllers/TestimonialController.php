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
			'checkAdmin + grant', // check user before granting a testimonial
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user
				'actions'=>array('propose', 'grant'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays the form for granting testimonial privilege.
	 */
	public function actionGrant()
	{
		$model = new Testimonial();
		if (isset($_POST['Testimonial']))
		{
			$username = $_POST['Testimonial']['student_id'];
			$student = Student::model()->findByAttributes(array('username'=>$username));
			if ($student === null)
			{
				Yii::app()->user->setFlash('message', 'Mahasiswa ' . $username . ' tidak terdaftar.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
			else
			{
				if ($model->grantTo($student))
				{
					Yii::app()->user->setFlash('message', 'Hak berhasil diberikan.');
					Yii::app()->user->setFlash('messageType', 'success');
					$model->student_id = null;
				}
				else
				{
					Yii::app()->user->setFlash('message', 'Hak tidak berhasil diberikan.');
					Yii::app()->user->setFlash('messageType', 'danger');
				}
			}
		}

		$this->render('grant',array(
			'model'=>$model,
		));
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

	/**
	 * A filter to assure only admin can grant testimonial.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckAdmin($filterChain)
	{
		if ( ! Yii::app()->user->getState('is_admin'))
			throw new CHttpException(403, 'Anda bukan administrator.');

		$filterChain->run();
	}
}