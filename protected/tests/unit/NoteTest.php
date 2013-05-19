<?php

class NoteTest extends CDbTestCase
{
	public $fixtures = array(
		'notes'=>'Note',
		'faculties'=>'Faculty',
		'courses'=>'Course',
		'students'=>'Student',
	);

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
		$this->assertTrue(in_array(array('extension'=>'html', 'name'=>'Teks'), $allowedTypes));

		$this->assertEquals('pdf', $note1->getExtension());
		$this->assertEquals('jpg', $note2->getExtension());
		$this->assertEquals('html', $note3->getExtension());

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
	 * Tests the note upload scenario.
	 */
	public function testUpload()
	{
		$student = $this->students('student1');
		$course = $this->courses('course1');
		$uploadedFile = array(
			'name'=>array('file'=>'Test.pdf'),
			'type'=>array('file'=>'application/pdf'),
			'tmp_name'=>array('file'=>''),
			'error'=>array('file'=>0),
			'size'=>array('file'=>100 * 1024),
		);

		// Basic flow
		$note = new Note();
		$note->setAttributes(array(
			'title'=>'Test Note',
			'description'=>'Test note description.',
			'course_id'=>$course->id,
			'faculty_id'=>$course->faculty_id,
			'file'=>'',
		));
		$_FILES['Note'] = $uploadedFile;
		$this->assertTrue($note->validate());
		$note->student_id = $student->id;
		$note->save(false);

		$newNote = Note::model()->findByPk($note->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
		$this->assertEquals($note->title, $newNote->title);
		$this->assertNotNull($newNote->type);
		$this->assertEquals('pdf', $newNote->getExtension());
		$this->assertNotNull($newNote->student_id);
		$this->assertNotNull($newNote->upload_timestamp);

		// Alternative flow: insert new course
		$newCourseName = 'Test New Course';
		$otherNote = new Note();
		$otherNote->attributes = $note->attributes;
		$otherNote->setAttributes(array(
			'course_id'=>null,
			'faculty_id'=>$course->faculty_id,
			'file'=>'',
			'new_course_name'=>$newCourseName,
		));
		$this->assertTrue($otherNote->validate());
		$otherNote->student_id = $student->id;
		$otherNote->save(false);

		$newCourse = Course::model()->findByAttributes(array(
			'faculty_id'=>$otherNote->faculty_id,
			'name'=>$newCourseName,
		));
		$this->assertNotNull($newCourse);
		$this->assertTrue($newCourse instanceof Course);
		$newNote = Note::model()->findByPk($otherNote->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
		$this->assertEquals($newCourse->id, $newNote->course_id);

		// Alternative flow: text-based note
		$text = 'Test note content.';
		$otherNote = new Note();
		$otherNote->attributes = $note->attributes;
		$otherNote->setAttributes(array(
			'faculty_id'=>$course->faculty_id,
			'raw_file_text'=>$text,
		));
		$this->assertTrue($otherNote->validate());
		$otherNote->student_id = $student->id;
		$otherNote->save(false);

		$newNote = Note::model()->findByPk($otherNote->id);
		$this->assertNotNull($newNote);
		$this->assertTrue($newNote instanceof Note);
		$this->assertEquals('html', $newNote->extension);
		$newFile = Yii::app()->params['notesDir'] . $newNote->id . '.html';
		$this->assertFileExists($newFile);
		$this->assertEquals($text, file_get_contents($newFile));


		/* Illegal user input test */

		// Illegal title
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->title = null;
		$this->assertFalse($fakeNote->validate());
		Yii::import('ext.randomness.*');
		$fakeNote->title = Randomness::randomString(200);
		$this->assertFalse($fakeNote->validate());

		// Illegal description
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->description = null;
		$this->assertFalse($fakeNote->validate());

		// Illegal course_id
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->course_id = 1000;
		$this->assertFalse($fakeNote->validate());

		// Illegal faculty_id
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->faculty_id = null;
		$this->assertFalse($fakeNote->validate());
		$fakeNote->faculty_id = 1000;
		$this->assertFalse($fakeNote->validate());

		// Illegal file type
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeUploadedFile = $uploadedFile;
		$fakeUploadedFile['name'] = array('file'=>'Test.avi');
		$fakeUploadedFile['type'] = array('file'=>'video/x-msvideo');
		$_FILES['Note'] = $fakeUploadedFile;
		$this->assertFalse($fakeNote->validate());

		// Illegal file size
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeUploadedFile = $uploadedFile;
		$fakeUploadedFile['size'] = array('file'=>1024 * 1024);
		$_FILES['Note'] = $fakeUploadedFile;
		$this->assertFalse($fakeNote->validate());

		// Empty file and raw text
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->raw_file_text = null;
		$fakeNote->file = null;
		unset($_FILES['Note']);
		$this->assertFalse($fakeNote->validate());

		// Empty course_id and new_course_name
		$fakeNote = new Note();
		$fakeNote->attributes = $note->attributes;
		$fakeNote->course_id = null;
		$fakeNote->new_course_name = null;
		$this->assertFalse($fakeNote->validate());
	}
}