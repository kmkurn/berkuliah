<?php

class TestimonialTest extends CDbTestCase
{
	public $fixtures = array(
		'students'=>'Student',
	);

	/**
	 * Tests the create testimonial action.
	 */
	public function testCreate()
	{
		$student = $this->students('student1');

		$testiContent = 'Test testimonial content.';
		$testimonial = new Testimonial();
		$testimonial->setAttributes(array(
			'content'=>$testiContent,
		));

		$this->assertTrue($testimonial->validate());
		$testimonial->student_id = $student->id;
		$testimonial->save(false);

		$newTestimonial = Testimonial::model()->findByPk($testimonial->id);
		$this->assertNotNull($newTestimonial);
		$this->assertTrue($newTestimonial instanceof Testimonial);
		$this->assertEquals($testiContent, $newTestimonial->content);
		$this->assertEquals(Testimonial::STATUS_NEW, $newTestimonial->status);
		$this->assertNotEquals('0000-00-00 00:00:00', $newTestimonial->timestamp);
	}

	/**
	 * Tests the create testimonial action with invalid input.
	 */
	public function testCreateInvalid()
	{
		$student = $this->students('student1');

		$testimonial = new Testimonial();
		$testimonial->setAttributes(array(
			'content'=>null,
		));

		$this->assertFalse($testimonial->validate());
	}
}