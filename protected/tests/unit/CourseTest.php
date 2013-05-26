<?php

/**
 * Unit test for Course model.
 */
class CourseTest extends CDbTestCase
{
	/**
	 * A dummy id representing invalid course id.
	 */
	const INVALID_ID = 1000;

	/**
	 * The fixtures of this test.
	 */
	public $fixtures = array(
		'faculties'=>'Faculty',
	);

	/**
	 * Tests create new course.
	 */
	public function testCreate()
	{
		$courseName = 'New Course Name';
		$faculty = $this->faculties('faculty1');
		$course = new Course();
		$course->setAttributes(array(
			'name'=>$courseName,
			'faculty_id'=>$faculty->id,
		));

		$this->assertTrue($course->save());

		$newCourse = Course::model()->findByPk($course->id);
		$this->assertNotNull($newCourse);
		$this->assertTrue($newCourse instanceof Course);
		$this->assertEquals($courseName, $newCourse->name);
	}

	/**
	 * Tests create new course with invalid input.
	 */
	public function testCreateInvalid()
	{
		// Empty faculty_id
		$fakeCourse = new Course();
		$fakeCourse->name = 'Test Invalid Course';
		$fakeCourse->faculty_id = null;
		$this->assertFalse($fakeCourse->validate());

		// Invalid faculty_id
		$fakeCourse = new Course();
		$fakeCourse->name = 'Test Invalid Course';
		$fakeCourse->faculty_id = self::INVALID_ID;
		$this->assertFalse($fakeCourse->validate());

		// Lengthy name
		$faculty = $this->faculties('faculty1');
		$fakeCourse = new Course();
		$fakeCourse->faculty_id = $faculty->id;
		Yii::import('ext.randomness.*');
		$fakeCourse->name = Randomness::randomString(Course::MAX_NAME_LENGTH + 1);
		$this->assertFalse($fakeCourse->validate());
	}
}