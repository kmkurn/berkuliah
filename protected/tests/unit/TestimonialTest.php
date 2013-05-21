<?php

class TestimonialTest extends CDbTestCase
{
	public $fixtures = array(
		'students'=>'Student',
	);

	/**
	 * Tests grant right to write testimonial.
	 */
	public function testGrant()
	{
		$student = $this->students('student2');

		$testimonial = new Testimonial();

		$this->assertTrue($testimonial->grantTo($student));

		$newTestimonial = Testimonial::model()->findByPk($testimonial->id);
		$this->assertNotNull($newTestimonial);
		$this->assertTrue($newTestimonial instanceof Testimonial);
		$this->assertEquals(Testimonial::STATUS_NEW, $newTestimonial->status);
		$this->assertNotEquals('0000-00-00 00:00:00', $newTestimonial->timestamp);
		$this->assertEquals($student->id, $newTestimonial->student_id);
	}
}