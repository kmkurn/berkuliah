<?php

class StudentTest extends CDbTestCase
{
	const INVALID_ID = 1000;

	public $fixtures = array(
		'students'=>'Student',
		'faculties'=>'Faculty',
		'badges'=>'Badge',
	);

	public $testFile = array(
		'name'=>'Test.jpg',
		'tmp_name'=>'',
		'type'=>'image/jpeg',
		'size'=>10240,
		'error'=>0,
	);

	/**
	 * Tests the student update action.
	 */
	public function testUpdate()
	{
		$faculty = $this->faculties('faculty2');
		$student = $this->students('student1');

		$studentName = 'Updated Name';
		$studentBio = 'Updated bio.';
		$student->setAttributes(array(
			'name'=>$studentName,
			'bio'=>$studentBio,
			'faculty_id'=>$faculty->id,
			'file'=>new CUploadedFile($this->testFile['name'], $this->testFile['tmp_name'], $this->testFile['type'],
				$this->testFile['size'], $this->testFile['error']),
		));

		$this->assertTrue($student->save());
		
		$updatedStudent = Student::model()->findByPk($student->id);
		$this->assertNotNull($updatedStudent);
		$this->assertTrue($updatedStudent instanceof Student);
		$this->assertEquals($studentName, $updatedStudent->name);
		$this->assertEquals($studentBio, $updatedStudent->bio);
		$this->assertEquals($faculty->id, $updatedStudent->faculty_id);
	}

	/**
	 * Tests the student update action with no photo is uploaded.
	 */
	public function testUpdateWithoutPhoto()
	{
		$student = $this->students('student1');
		$studentName = 'Updated Name';
		$student->name = $studentName;
		$student->file = null;

		$this->assertTrue($student->save());

		$updatedStudent = Student::model()->findByPk($student->id);
		$this->assertNotNull($updatedStudent);
		$this->assertTrue($updatedStudent instanceof Student);
		$this->assertEquals($studentName, $updatedStudent->name);
		$this->assertEquals($student->photo, $updatedStudent->photo);
	}

	/**
	 * Tests the student update action with invalid input.
	 */
	public function testUpdateInvalid()
	{
		$model = $this->students('student1');

		// Empty name
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeStudent->name = null;
		$this->assertFalse($fakeStudent->validate());

		// Lengthy name
		$fakeStudent = Student::model()->findByPk($model->id);
		Yii::import('ext.randomness.*');
		$fakeStudent->name = Randomness::randomString(Student::MAX_NAME_LENGTH + 1);
		$this->assertFalse($fakeStudent->validate());

		// Empty faculty_id
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeStudent->faculty_id = null;
		$this->assertFalse($fakeStudent->validate());

		// Invalid faculty_id
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeStudent->faculty_id = self::INVALID_ID;
		$this->assertFalse($fakeStudent->validate());

		// Invalid file type
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeFile = $this->testFile;
		$fakeFile['name'] = 'Test.avi';
		$fakeFile['type'] = 'video/x-msvideo';
		$fakeStudent->file = new CUploadedFile($fakeFile['name'], $fakeFile['tmp_name'], $fakeFile['type'],
			$fakeFile['size'], $fakeFile['error']);
		$this->assertFalse($fakeStudent->validate());

		// Invalid file size
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeFile = $this->testFile;
		$fakeFile['size'] = Student::MAX_FILE_SIZE * 2;
		$fakeStudent->file = new CUploadedFile($fakeFile['name'], $fakeFile['tmp_name'], $fakeFile['type'],
			$fakeFile['size'], $fakeFile['error']);
		$this->assertFalse($fakeStudent->validate());
	}

	/**
	 * Tests adding a badge.
	 */
	public function testAddBadge()
	{
		$badge = $this->badges('badge2');
		$student = $this->students('student2');

		$this->assertTrue($student->addBadge($badge));
		$this->assertTrue($student->hasBadge($badge));
	}
}