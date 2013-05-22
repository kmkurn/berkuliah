<?php

class NoteController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for viewing note details
			'checkNoteOwner + edit, delete', // check user before editing or deleting a note
			'checkReported + report', // check user before reporting a note
			'ajaxOnly + review, rate',
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
				'actions'=>array('view', 'update', 'delete', 'upload', 'download', 'rate', 'report', 'review', 'updateCourses'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Views the detailed information of a note.
	 * @param  int $id the note id
	 */

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$review = new Review();

		$dataProvider = new CActiveDataProvider('Review', array(
			'criteria'=>array(
				'condition'=>'note_id=:noteId',
				'order'=>'timestamp ASC',
				'params'=>array(':noteId'=>$model->id),
			),
		));

		$this->render('view', array(
			'model' => $model, 
			'dataProvider'=>$dataProvider,
			'review'=>$review,
		));
	}

	/**
	 * Updates a note.
	 * @param  int $id the note id
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
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
	 * Deletes a note.
	 * @param  int $id the note id
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		if ($model->delete())
		{
			unlink(Yii::app()->params['notesDir'] . $model->id . '.' . $model->extension);
			Yii::app()->user->setFlash('message', 'Berkas berhasil dihapus.');
			Yii::app()->user->setFlash('messageType', 'success');
		}
		else
		{
			Yii::app()->user->setFlash('message', 'Berkas tidak dapat dihapus.');
			Yii::app()->user->setFlash('messageType', 'danger');
		}
		$this->redirect(array('home/index'));
	}
	
	/**
	 * Uploads a note.
	 */
	public function actionUpload()
	{
		$model = new Note();

		if (isset($_POST['Note']))
		{
			$model->attributes = $_POST['Note'];
			if ($model->validate())
			{
				// sets extension
				$extension = 'html';
				if (empty($model->raw_file_text))
				{
					$noteFile = CUploadedFile::getInstance($model, 'file');
					$extension = $noteFile->extensionName;
				}
				$model->type = Note::getTypeFromExtension($extension);

				$model->save(false);

				// saves file
				$filePath = Yii::app()->params['notesDir'];
				if (empty($model->raw_file_text))
				{
					$noteFile = CUploadedFile::getInstance($model, 'file');
					$noteFile->saveAs($filePath . $model->id . '.' . $noteFile->extensionName);
				}
				else
				{
					touch($filePath . $model->id . '.htm');
					file_put_contents($filePath . $model->id . '.htm', $model->raw_file_text);
				}

				$message['text'] = 'Berkas berhasil diunggah.';
				$message['default_text'] = 'Saya baru saja mengunggah ' . $model->title . ' pada BerKuliah!';
				$message['name'] = $model->title;
				$message['link'] = array('note/view', 'id' => $model->id);
				$message['picture'] = 'htm.svg';
				$message['caption'] = $model->course->name . ' | ' . $model->course->faculty->name;
				$message['description'] = $model->description;
				Yii::app()->user->addShareMessage($message);

				$this->redirect(array('home/index'));
			}
			else
			{
				$model->faculty_id = null;
				Yii::app()->user->setFlash('message', 'Terdapat kesalahan pengisian.');
				Yii::app()->user->setFlash('messageType', 'danger');
			}
		}

		$this->render('upload', array(
			'model' => $model,
		));
	}

	/**
	 * Downloads a note.
	 * @param  int $id the note id
	 */
	public function actionDownload($id)
	{
		$model = $this->loadModel($id);
		$model->downloadedBy(Yii::app()->user->id);

		$fileName = $model->id . '.' . $model->extension;
		$filePath = Yii::app()->params['notesDir'] . $fileName;
		Yii::app()->request->sendFile($model->title . '.' . $model->extension, file_get_contents($filePath));
	}

	/**
	 * AJAX response for rating AJAX request.
	 */
	public function actionRate()
	{
		$note_id = $_POST['note_id'];
		$student_id = $_POST['student_id'];
		$rating = $_POST['rating'];

		$model = $this->loadModel($note_id);
		$model->rate($student_id, $rating);

		$totalRating = $model->getTotalRating();
		$ratersCount = $model->getRatersCount();

		if ( ! $totalRating)
			echo 'N/A';
		else
			echo '' . ((double)$totalRating / $ratersCount) . ' (dari ' . $ratersCount . ' pengguna)';
	}

	/**
	 * AJAX response for review AJAX request.
	 */
	public function actionReview()
	{
		$noteId = $_POST['note_id'];
		$model = $this->loadModel($noteId);
		$review = new Review();
		$review->attributes = $_POST['Review'];

		$model->addReview($review, Yii::app()->user->id);

		echo $this->renderPartial('_review', array('data'=>$review), true);
	}


	/**
	 * Reports a note.
	 * @param  int $id the note id
	 */
	public function actionReport($id)
	{
		$model = $this->loadModel($id);
		$model->report(Yii::app()->user->id);

		Yii::app()->user->setFlash('message', 'Berkas berhasil dilaporkan.');
		Yii::app()->user->setFlash('messageType', 'success');

		$this->redirect(array('view', 'id' => $id));
	}

	/**
	 * Performs update courses in dropdown list.
	 */
	public function actionUpdateCourses()
	{
		if (isset($_POST['faculty_id']))
		{
			$courses = Course::model()->findAll('faculty_id=:X', array(':X' => (int) $_POST['faculty_id']));
			
			echo CHtml::dropDownList('Note[course_id]', '',
				CHtml::listData($courses, 'id', 'name'), 
				   array('prompt' => 'Pilih mata kuliah'));
		}
		else
		{
			throw new CHttpException(400, 'Your request is invalid.');
		}
	}

	/**
	 * Loads the note model.
	 * @param  int $id the note id
	 * @return Note the note object associated with the given id
	 */
	public function loadModel($id)
	{
		$model = Note::model()->findByPk($id);
		if ($model === NULL)
		{
			throw new CHttpException(404, 'Berkas catatan yang dimaksud tidak ada.');
		}

		return $model;
	}

	/**
	 * A filter to assure only the note owner can edit or delete the note.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckNoteOwner($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			if ($model->student_id !== Yii::app()->user->id)
			{
				throw new CHttpException(403, 'Berkas ini bukan milik Anda.');
			}
		}

		$filterChain->run();
	}


	/**
	 * A filter to assure a student only report a note once.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckReported($filterChain)
	{
		if (isset($_GET['id']))
		{
			$model = $this->loadModel($_GET['id']);
			if ($model->isReportedBy(Yii::app()->user->id))
			{
				throw new CHttpException(403, 'Anda tidak dapat melaporkan berkas lebih dari sekali.');
			}
		}

		$filterChain->run();
	}
}