<?php

class TestimonialTest extends CDbTestCase
{
	public $fixtures = array(
		'students'=>'Student',
		'testimonials'=>'Testimonial',
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

	/**
	 * Tests testimonial approval.
	 */
	public function testApprove()
	{
		$testi = $this->testimonials('testimonial2');

		$this->assertTrue($testi->approve());
		$updatedTesti = Testimonial::model()->findByPk($testi->id);
		$this->assertEquals(Testimonial::STATUS_APPROVED, $testi->status);
	}

	/**
	 * Tests testimonial rejection.
	 */
	public function testReject()
	{
		$testi = $this->testimonials('testimonial2');

		$this->assertTrue($testi->reject());
		$updatedTesti = Testimonial::model()->findByPk($testi->id);
		$this->assertEquals(Testimonial::STATUS_NEW, $testi->status);
	}

	/**
	 * Tests this month testimonial retrieval.
	 */
	public function testCurrentTestimonial()
	{
		$testi = Testimonial::getCurrentTestimonial();

		$this->assertNull($testi);

		$student = $this->students('student1');
		$content = 'Test content.';
		$currentTimestamp = date('Y-m-d H:i:s');
		$newTesti = new Testimonial();
		$newTesti->setAttributes(array(
			'content'=>'Test content.',
			'status'=>Testimonial::STATUS_APPROVED,
			'timestamp'=>$currentTimestamp,
			'student_id'=>$student->id,
		));

		$this->assertTrue($newTesti->save());

		$testi = Testimonial::getCurrentTestimonial();

		$this->assertNotNull($testi);
		$this->assertTrue($testi instanceof Testimonial);
		$this->assertEquals($student->id, $testi->student_id);
		$this->assertEquals($content, $testi->content);
		$this->assertEquals(Testimonial::STATUS_APPROVED, $testi->status);
		$this->assertEquals(date('m', strtotime($currentTimestamp)), date('m', strtotime($testi->timestamp)));
		$this->assertEquals($student->id, $testi->student_id);
	}
}