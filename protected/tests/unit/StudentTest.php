<?php

class StudentTest extends CDbTestCase
{
	public $fixtures = array(
		'students'=>'Student',
		'faculties'=>'Faculty',
	);

	/**
	 * Tests update action.
	 */
	public function testUpdate()
	{
		$model = $this->students('student1');
		$faculty = $this->faculties('faculty2');

		$student = Student::model()->findByPk($model->id);
		$this->assertNotNull($student);
		$this->assertTrue($student instanceof Student);
		$this->assertNotEquals($faculty->id, $student->faculty_id);

		$studentName = 'Updated Name';
		$studentBio = 'Updated bio.';
		$student->setAttributes(array(
			'name'=>$studentName,
			'bio'=>$studentBio,
			'faculty_id'=>$faculty->id,
		));
		$this->assertTrue($student->save());
		
		$newStudent = Student::model()->findByPk($student->id);
		$this->assertNotNull($newStudent);
		$this->assertTrue($newStudent instanceof Student);
		$this->assertEquals($studentName, $newStudent->name);
		$this->assertEquals($studentBio, $newStudent->bio);
		$this->assertEquals($faculty->id, $newStudent->faculty_id);


		/* Illegal user input */

		// Illegal name
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeStudent->name = null;
		$this->assertFalse($fakeStudent->validate());
		$fakeStudent->name = Randomness::randomString(200);
		$this->assertFalse($fakeStudent->validate());

		// Illegal faculty_id
		$fakeStudent = Student::model()->findByPk($model->id);
		$fakeStudent->faculty_id = null;
		$this->assertFalse($fakeStudent->validate());
		$fakeStudent->faculty_id = 1000;
		$this->assertFalse($fakeStudent->validate());
	}
}