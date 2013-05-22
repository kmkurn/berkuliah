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
			'checkTestimonialOwner + propose, update', // check user before proposing a testimonial
			'checkAdmin + grant, approve, reject', // check user before granting, approving, or rejecting a testimonial
			'checkNewStatus + update', // check status before updating a testimonial
			'checkPendingStatus + approve, reject', // check status before approving or rejecting a testimonial
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user
				'actions'=>array('propose', 'grant', 'view', 'update', 'approve', 'reject'),
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
		$this->render('view', array(
			'model' => $model,
		));		
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

		$students = Student::model()->findAll();
		$usernames = array();
		foreach ($students as $student)
			$usernames[] = $student->username;

		$this->render('grant',array(
			'model'=>$model,
			'usernames'=>$usernames,
		));
	}


	/**
	 * Propose a testimonial.
	 */
	public function actionPropose($id)
	{
		$model = $this->loadModel($id);

		$model->propose();
		Yii::app()->user->setFlash('message', 'Testimoni berhasil diusulkan.');
		Yii::app()->user->setFlash('messageType', 'success');
		$this->redirect(array('testimonial/view', 'id'=>$id));
	}

	/**
	 * Updates a note.
	 * @param  int $id the note id
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Testimonial']))
		{
			$model->attributes = $_POST['Testimonial'];
			if ($model->save())
			{
				Yii::app()->user->setFlash('message', 'Perubahan berhasil disimpan.');
				Yii::app()->user->setFlash('messageType', 'success');
				$this->redirect(array('view', 'id' => $model->id));
			}
			else
			{
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$this->render('update', array('model' => $model));
	}

	/**
	 * Approves a testimonial.
	 * @param  integer $id the testimonial id
	 */
	public function actionApprove($id)
	{
		$model = $this->loadModel($id);

		if (!$model->approve())
		{
			Yii::app()->user->setFlash('message', 'Testimoni gagal diterima.');
			Yii::app()->user->setFlash('messageType', 'danger');
		}
		else
		{
			Yii::app()->user->setFlash('message', 'Testimoni berhasil diterima.');
			Yii::app()->user->setFlash('messageType', 'success');
		}

		$this->redirect(array('view', 'id'=>$model->id));
	}

	/**
	 * Rejects a testimonial.
	 * @param  integer $id the testimonial id
	 */
	public function actionReject($id)
	{
		$model = $this->loadModel($id);

		if (!$model->reject())
		{
			Yii::app()->user->setFlash('message', 'Testimoni gagal ditolak.');
			Yii::app()->user->setFlash('messageType', 'danger');
		}
		else
		{
			Yii::app()->user->setFlash('message', 'Testimoni berhasil ditolak.');
			Yii::app()->user->setFlash('messageType', 'success');
		}

		$this->redirect(array('view', 'id'=>$model->id));
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
			throw new CHttpException(404, 'Testimonial yang dimaksud tidak ada.');
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
				throw new CHttpException(403, 'Testimoni ini bukan milik Anda.');
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
		if ( ! Yii::app()->user->isAdmin)
			throw new CHttpException(403, 'Anda bukan administrator.');

		$filterChain->run();
	}

	/**
	 * A filter to assure only new testimonial can be updated.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckNewStatus($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			$status = Testimonial::STATUS_NEW;
			if ($model->status != $status)
			{
				$statusMap = Testimonial::getStatusMap();
				throw new CHttpException(403, 'Testimoni ini statusnya bukan "'.$statusMap[$status].'".');
			}
		}

		$filterChain->run();
	}

	/**
	 * A filter to assure only pending testimonial can be approved or rejected.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckPendingStatus($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			$status = Testimonial::STATUS_PENDING;
			if ($model->status != $status)
			{
				$statusMap = Testimonial::getStatusMap();
				throw new CHttpException(403, 'Testimoni ini statusnya bukan "'.$statusMap[$status].'".');
			}
		}

		$filterChain->run();
	}
}