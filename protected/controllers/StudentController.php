<?php

/**
 * A class representing the /student/ pages in the application.
 */
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
				$photo = CUploadedFile::getInstance($model, 'file');
				if ($photo !== null)
				{
					$savePath = Yii::app()->params['photosDir'];
					if ($model->photo !== null)
						unlink($savePath . $model->photo);
					Yii::import('ext.randomness.*');
					$fileName = Randomness::randomString(Student::MAX_FILENAME_LENGTH - strlen($photo->extensionName) - strlen('' + $model->id) - 1);
					$fileName = $fileName . $model->id . '.' . $photo->extensionName;
					$photo->saveAs($savePath . $fileName);

					$model->photo = $fileName;
					Yii::app()->user->setState('profilePhoto', $fileName);
				}

				$model->save(false);

				Yii::app()->user->setName($model->name);
				Yii::app()->user->setNotification('success', 'Profil berhasil diubah.');
			}
			else
			{
				Yii::app()->user->setNotification('danger', 'Terdapat kesalahan pengisian.');
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

		$numItems = Yii::app()->params['itemsPerPage'];

		$downloads = new CArrayDataProvider($model->downloadInfos, array(
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$reviews = new CArrayDataProvider($model->reviews, array(
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$sql = Yii::app()->db->createCommand()
			->select(array('id', 'title', 'value', 'note_id', 'timestamp'))
			->from(array('bk_note note', 'bk_rate rate'))
			->where(array('and', 'rate.student_id=:sid', 'rate.note_id=note.id'),
				array(':sid'=>$model->id));
		$count = count($model->rates);
		$rates = new CSqlDataProvider($sql, array(
			'totalItemCount'=>$count,
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$sql = Yii::app()->db->createCommand()
			->select(array('id', 'title', 'note_id', 'timestamp'))
			->from(array('bk_note note', 'bk_report report'))
			->where(array('and', 'report.student_id=:sid', 'report.note_id=note.id'),
				array(':sid'=>$model->id));
		$count = count($model->reports);
		$reports = new CSqlDataProvider($sql, array(
			'totalItemCount'=>$count,
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$uploads = new CArrayDataProvider($model->notes, array(
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$badges = new CArrayDataProvider($model->badges, array(
			'pagination'=>array(
				'pageSize'=>20,
			),
		));

		if (Yii::app()->user->isAdmin)
			$finder = Testimonial::model();
		else
			$finder = Testimonial::model()->student($model->id);

		$testimonials = new CActiveDataProvider($finder, array(
			'pagination'=>array(
				'pageSize'=>$numItems,
			),
		));

		$this->render('view',array(
			'model'=>$model,
			'downloads'=>$downloads,
			'reviews'=>$reviews,
			'rates'=>$rates,
			'reports'=>$reports,
			'uploads'=>$uploads,
			'badges'=>$badges,
			'testimonials'=>$testimonials,
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