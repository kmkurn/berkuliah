<?php

/**
 * Unit test for Testimonial model.
 */
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
	 * Tests whether all statuses have string representation
	 */
	public function testGetStatusMap()
	{
		$repr = Testimonial::getStatusMap();
		$this->assertEquals(3, count($repr));
		$this->assertTrue(array_key_exists(Testimonial::STATUS_NEW, $repr));
		$this->assertTrue(array_key_exists(Testimonial::STATUS_PENDING, $repr));
		$this->assertTrue(array_key_exists(Testimonial::STATUS_APPROVED, $repr));
	}

	/**
	 * Tests whether testimonial status have the correct string representation
	 */
	public function testGetStatusString()
	{
		$repr = Testimonial::getStatusMap();

		$testimonial1 = $this->testimonials('testimonial1');
		$this->assertEquals($repr[$testimonial1->status], $testimonial1->getStatusString());

		$testimonial2 = $this->testimonials('testimonial2');
		$this->assertEquals($repr[$testimonial2->status], $testimonial2->getStatusString());

		$testimonial3 = $this->testimonials('testimonial3');
		$this->assertEquals($repr[$testimonial3->status], $testimonial3->getStatusString());
	}

	/**
	 * Tests proposing testimonial.
	 */
	public function testPropose()
	{
		$testimonial1 = $this->testimonials('testimonial1');
		$testimonial1->propose();

		$this->assertEquals(Testimonial::STATUS_PENDING, $testimonial1->status);
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
		$this->assertNull(Testimonial::getCurrentTestimonial());

		$testi = $this->testimonials('testimonial1');
		$currentTimestamp = date('Y-m-d H:i:s');
		$testi->status = Testimonial::STATUS_NEW;
		$testi->timestamp = $currentTimestamp;
		$this->assertTrue($testi->save());

		$this->assertNull(Testimonial::getCurrentTestimonial());

		$student = $this->students('student1');
		$content = 'Test content.';
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