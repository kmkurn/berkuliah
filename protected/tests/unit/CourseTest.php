<?php

class CourseTest extends CDbTestCase
{
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

		
		/* Illegal user input test */

		// Illegal faculty_id
		$fakeCourse = new Course();
		$fakeCourse->attributes = $course->attributes;
		$fakeCourse->faculty_id = 1000;
		$this->assertFalse($fakeCourse->validate());

		// Illegal name
		$fakeCourse = new Course();
		$fakeCourse->attributes = $course->attributes;
		Yii::import('ext.randomness.*');
		$fakeCourse->name = Randomness::randomString(200);
		$this->assertFalse($fakeCourse->validate());
	}
}