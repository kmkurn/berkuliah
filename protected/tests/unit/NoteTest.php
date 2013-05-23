<?php

class NoteTest extends CDbTestCase
{
	const INVALID_ID = 1000;

	public $fixtures = array(
		'notes'=>'Note',
		'faculties'=>'Faculty',
		'courses'=>'Course',
		'students'=>'Student',
	);

	public $testFile = array(
		'name'=>'Test.pdf',
		'tmp_name'=>'',
		'type'=>'application/pdf',
		'size'=>102400,
		'error'=>0,
	);

	public $noteAttributes;

	/**
	 * Initialization.
	 */
	public function init()
	{
		$course = $this->courses('course1');

		$this->noteAttributes = array(
			'title'=>'Test Note',
			'description'=>'Test note description.',
			'course_id'=>$course->id,
			'faculty_id'=>$course->faculty_id,
			'file'=>new CUploadedFile($this->testFile['name'],$this->testFile['tmp_name'],$this->testFile['type'],
				$this->testFile['size'],$this->testFile['error']),
		);
	}

	/**
	 * Tests functions related to note extension.
	 */
	public function testExtension()
	{
		$note1 = $this->notes('note1');
		$note2 = $this->notes('note2');
		$note3 = $this->notes('note3');

		$allowedTypes = Note::getAllowedTypes();
		$this->assertEquals(3, count($allowedTypes));
		$this->assertTrue(in_array(array('extension'=>'pdf', 'name'=>'PDF'), $allowedTypes));
		$this->assertTrue(in_array(array('extension'=>'jpg', 'name'=>'Gambar'), $allowedTypes));
		$this->assertTrue(in_array(array('extension'=>'htm', 'name'=>'Teks'), $allowedTypes));

		$this->assertEquals('pdf', $note1->getExtension());
		$this->assertEquals('jpg', $note2->getExtension());
		$this->assertEquals('htm', $note3->getExtension());

		$this->assertFileExists($note1->getTypeIcon());
		$this->assertFileExists($note2->getTypeIcon());
		$this->assertFileExists($note3->getTypeIcon());

		$typeNames = Note::getTypeNames();
		$this->assertEquals(3, count($typeNames));
		$this->assertTrue(in_array('PDF', $typeNames));
		$this->assertTrue(in_array('Gambar', $typeNames));
		$this->assertTrue(in_array('Teks', $typeNames));

		for ($i = 0; $i < count($allowedTypes); $i++)
		{
			$type = $allowedTypes[$i];
			$this->assertEquals($i, Note::getTypeFromExtension($type['extension']));
		}
		$this->assertEquals(-1, Note::getTypeFromExtension('mp3'));
	}

	/**
	 * Tests the note upload action.
	 */
	public function testUpload()
	{
		$this->init();

		$student = $this->students('student1');

		$note = new Note();
		$note->setAttributes($this->noteAttributes);

		$this->assertTrue($note->validate());
		$note->student_id = $student->id;
		$note->save(false);

		$newNote = Note::model()->findByPk($note->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
		$this->assertEquals($note->title, $newNote->title);
		$this->assertNotNull($newNote->student_id);
		$this->assertNotEquals('0000-00-00 00:00:00', $newNote->upload_timestamp);
	}

	/**
	 * Tests the note upload action with new course.
	 */
	public function testUploadNewCourse()
	{
		$this->init();

		$student = $this->students('student1');

		$courseName = 'Test New Course';
		$note = new Note();
		$note->setAttributes($this->noteAttributes);
		$note->course_id = null;
		$note->new_course_name = $courseName;

		$this->assertTrue($note->validate());
		$note->student_id = $student->id;
		$note->save(false);

		$newCourse = Course::model()->findByAttributes(array(
			'faculty_id'=>$note->faculty_id,
			'name'=>$courseName,
		));
		$this->assertNotNull($newCourse);
		$this->assertTrue($newCourse instanceof Course);

		$newNote = Note::model()->findByPk($note->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
		$this->assertEquals($newCourse->id, $newNote->course_id);
	}

	/**
	 * Tests the note upload action with raw text.
	 */
	public function testUploadRawText()
	{
		$this->init();

		$student = $this->students('student1');

		$text = 'Test note content.';
		$note = new Note();
		$note->setAttributes($this->noteAttributes);
		$note->file = null;
		$note->raw_file_text = $text;

		$this->assertTrue($note->validate());
		$note->student_id = $student->id;
		$note->save(false);

		$newNote = Note::model()->findByPk($note->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
	}

	/**
	 * Tests the note upload action with invalid input.
	 */
	public function testUploadInvalid()
	{
		$this->init();

		// Empty title
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->title = null;
		$this->assertFalse($fakeNote->validate());

		// Lengthy title
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		Yii::import('ext.randomness.*');
		$fakeNote->title = Randomness::randomString(Note::MAX_TITLE_LENGTH + 1);
		$this->assertFalse($fakeNote->validate());

		// Empty description
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->description = null;
		$this->assertFalse($fakeNote->validate());

		// Invalid course_id
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->course_id = self::INVALID_ID;
		$this->assertFalse($fakeNote->validate());

		// Empty faculty_id
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->faculty_id = null;
		$this->assertFalse($fakeNote->validate());

		// Invalid faculty_id
		$fakeNote->faculty_id = self::INVALID_ID;
		$this->assertFalse($fakeNote->validate());

		// Invalid file type
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeFile = $this->testFile;
		$fakeFile['name'] = 'Fake.avi';
		$fakeFile['type'] = 'video/x-msvideo';
		$fakeNote->file = new CUploadedFile($fakeFile['name'], $fakeFile['tmp_name'], $fakeFile['type'],
			$fakeFile['size'], $fakeFile['error']);
		$this->assertFalse($fakeNote->validate());

		// Invalid file size
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeFile = $this->testFile;
		$fakeFile['size'] = Note::MAX_FILE_SIZE * 2;
		$fakeNote->file = new CUploadedFile($fakeFile['name'], $fakeFile['tmp_name'], $fakeFile['type'],
			$fakeFile['size'], $fakeFile['error']);
		$this->assertFalse($fakeNote->validate());

		// Empty file and raw text
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->raw_file_text = null;
		$fakeNote->file = null;
		$this->assertFalse($fakeNote->validate());

		// Empty course_id and new_course_name
		$fakeNote = new Note();
		$fakeNote->setAttributes($this->noteAttributes);
		$fakeNote->course_id = null;
		$fakeNote->new_course_name = null;
		$this->assertFalse($fakeNote->validate());
	}

	/**
	 * Tests the note update action.
	 */
	public function testUpdate()
	{
		$model = $this->notes('note3');

		$note = Note::model()->findByPk($model->id);
		$this->assertNotNull($note);
		$this->assertTrue($note instanceof Note);
		$this->assertNotEquals('0000-00-00 00:00:00', $note->edit_timestamp);

		$note->setAttributes(array(
			'title'=>'Updated Title',
			'description'=>'Updated description',
		));

		$this->assertTrue($note->save());

		$updatedNote = Note::model()->findByPk($note->id);
		$this->assertNotNull($updatedNote);
		$this->assertTrue($updatedNote instanceof Note);
		$this->assertEquals($note->title, $updatedNote->title);
		$this->assertEquals($note->description, $updatedNote->description);
		$this->assertNotEquals('0000-00-00 00:00:00', $updatedNote->edit_timestamp);
	}

	/**
	 * Tests the note update action with invalid input.
	 */
	public function testUpdateInvalid()
	{
		$model = $this->notes('note3');

		// Empty title
		$fakeNote = Note::model()->findByPk($model->id);
		$fakeNote->title = null;
		$this->assertFalse($fakeNote->validate());

		// Lengthy title
		$fakeNote = Note::model()->findByPk($model->id);
		Yii::import('ext.randomness.*');
		$fakeNote->title = Randomness::randomString(Note::MAX_TITLE_LENGTH + 1);
		$this->assertFalse($fakeNote->validate());

		// Empty description
		$fakeNote = Note::model()->findByPk($model->id);
		$fakeNote->description = null;
		$this->assertFalse($fakeNote->validate());
	}

	/**
	 * Tests delete action.
	 */
	public function testDelete()
	{
		$note = $this->notes('note1');

		$this->assertTrue($note->delete());
	}

	/**
	 * Tests download action.
	 */
	public function testDownload()
	{
		$student = $this->students('student1');
		$note = $this->notes('note1');

		$this->assertTrue($note->downloadedBy($student->id));
	}

	/**
	 * Tests search action.
	 */
	public function testSearch()
	{
		// search by title
		$note = new Note();
		$note->title = '1';
		$this->assertEquals(1, $note->search()->totalItemCount);

		// search by type
		$note = new Note();
		$note->type = 0;
		$this->assertEquals(1, $note->search()->totalItemCount);

		// search by faculty
		$note = new Note();
		$note->faculty_id = 1;
		$this->assertEquals(2, $note->search()->totalItemCount);

		// search by course
		$note = new Note();
		$note->course_id = 1;
		$this->assertEquals(1, $note->search()->totalItemCount);

		// search by uploader
		$note = new Note();
		$note->uploader = '1';
		$this->assertEquals(1, $note->search()->totalItemCount);
	}

	/** 
	 * Tests rate action.
	 */
	public function testRate()
	{
		$model = $this->notes('note1');
		$model->rate(1, 7);
		$this->assertEquals(7, $model->getRating(1));

		$model->rate(2, 9);
		$this->assertEquals(9, $model->getRating(2));
		$model->rate(2, 3);
		$this->assertEquals(3, $model->getRating(2));

		$this->assertEquals(10, $model->getTotalRating());
		$this->assertEquals(2, $model->getRatersCount());
	}


	/** 
	 * Tests report action.
	 */
	public function testReport()
	{
		$model = $this->notes('note1');
		$model->report(1);

		$cmd = Yii::app()->db->createCommand();
		$cmd->select('*');
		$cmd->from('bk_report');
		$cmd->where('note_id=:X AND student_id=:Y', array(':X' => $model->id, ':Y' => 1));

		$this->assertNotNull($cmd->queryRow());
	}

	/** 
	 * Tests isReportedBy method.
	 */
	public function testIsReportedBy()
	{
		$model = $this->notes('note1');
		$model->report(2);

		$this->assertTrue($model->isReportedBy(2));
	}
}