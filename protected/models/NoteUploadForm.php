<?php

/**
 * NoteUploadForm class.
 * NoteUploadForm is the data structure for uploading new note.
 */
class NoteUploadForm extends CFormModel
{
	public $title;
	public $description;
	public $faculty_id;
	public $course_id;
	public $new_course_name;
	public $file;
	public $raw_file_text;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('title, description, faculty_id', 'required'),
			// password needs to be authenticated
			array('course_id', 'checkCourse'),
			array('file', 'checkNote'),
			array('new_course_name, raw_file_text', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'title' => 'Judul',
			'description' => 'Deskripsi',
			'faculty_id' => 'Fakultas',
			'course_id' => 'Mata Kuliah',
			'file' => 'Berkas',
		);
	}

	public function checkCourse($attribute, $params)
	{
		if (empty($this->course_id) && empty($this->new_course_name))
			$this->addError('course_id', 'Mata Kuliah cannot be blank.');
	}

	public function checkNote($attribute, $params)
	{
		if (empty($this->raw_file_text))
		{
			$validator = new CFileValidator();
			$validator->attributes = array('file');
			$validator->maxSize = 100 * 1024;
			$validator->types = array('jpg', 'pdf');
			$validator->validate($this);
		}
	}

	public function saveNewCourse()
	{
		if (empty($this->course_id))
		{
			$course = new Course();
			$course->name = $this->new_course_name;
			$course->faculty_id = $this->faculty_id;
			$course->save();
			$this->course_id = $course->id;
		}
	}

	public function getNoteType()
	{
		if (empty($this->new_course_name))
			return 2;
		else
		{
			$noteFile = CUploadedFile::getInstance($this, 'file');
			if ($noteFile->extensionName == 'pdf')
				return 0;
			else
				return 1;
		}
	}

	public function saveNote($note_id)
	{
		if (empty($this->raw_file_text))
		{
			$noteFile = CUploadedFile::getInstance($this, 'file');
			$noteFile->saveAs('notes/' . $note_id . '.' . $noteFile->extensionName);
		}
		else
		{
			touch('notes/' . $note_id . '.html');
			file_put_contents('notes/' . $note_id . '.html', $this->raw_file_text);
		}
	}
}