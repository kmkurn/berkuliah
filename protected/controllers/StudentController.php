<?php

class StudentController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
			'checkAuthorized + update',
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
				'actions'=>array('index', 'view', 'update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays the profile page of the currently logged in student.
	 */
	public function actionIndex()
	{
		$this->redirect(array('view', 'id'=>Yii::app()->user->id));
	}

	/**
	 * Displays the update profile page of a student.
	 * @param  integer $id the student id
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if (isset($_POST['Student']))
		{
			$model->attributes = $_POST['Student'];
			if ($model->validate())
			{
				$model->store()->save(false);
				Yii::app()->user->setState('photo', $model->photo);
				Yii::app()->user->setFlash('message', 'Profil berhasil diubah.');
				Yii::app()->user->setFlash('messageType', 'success');
			}
			else
			{
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'faculties'=>Faculty::model()->findAll(),
		));
	}

	/**
	 * Displays the profile page of a student.
	 * @param  integer $id the student id
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);

		$downloadsDataProvider = new CActiveDataProvider('DownloadInfo', array(
			'criteria'=>array(
				'condition'=>'student_id=:studentId',
				'params'=>array(
					':studentId'=>$model->id,
				),
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));

		$uploadsDataProvider = new CActiveDataProvider('Note', array(
			'criteria'=>array(
				'condition'=>'student_id=:studentId',
				'params'=>array(
					':studentId'=>$model->id,
				),
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));

		$this->render('view',array(
			'model'=>$model,
			'downloadsDataProvider'=>$downloadsDataProvider,
			'uploadsDataProvider'=>$uploadsDataProvider,
		));
	}

	/**
	 * Loads the student model.
	 * @param  int $id the student id
	 * @return Student the student object associated with the given id
	 */
	public function loadModel($id)
	{
		$model = Student::model()->findByPk($id);
		if ($model === NULL)
		{
			throw new CHttpException(404, 'Pengguna yang dimaksud tidak ada.');
		}

		return $model;
	}

	/**
	 * A filter to ensure a student will not be able to update other students profile.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckAuthorized($filterChain)
	{
		if (isset($_GET['id']))
		{
			if ($_GET['id'] != Yii::app()->user->id)
			{
				throw new CHttpException(403, 'Anda tidak berhak melakukan operasi ini.');
			}
		}

		$filterChain->run();
	}
}