<?php

class ReviewTest extends CDbTestCase
{
	const INVALID_ID = 1000;

	public $fixtures = array(
		'notes'=>'Note',
		'students'=>'Student',
	);

	/**
	 * Tests the create review action.
	 */
	public function testCreate()
	{
		$note = $this->notes('note1');
		$student = $this->students('student1');

		$content = 'Test review content.';
		$review = new Review();
		$review->setAttributes(array(
			'content'=>$content,
		));

		$this->assertTrue($note->addReview($review, $student->id));

		$newReview = Review::model()->findByPk($review->id);
		$this->assertNotNull($newReview);
		$this->assertTrue($newReview instanceof Review);
		$this->assertEquals($content, $newReview->content);
		$this->assertEquals($note->id, $newReview->note_id);
		$this->assertEquals($student->id, $newReview->student_id);
		$this->assertNotEquals('0000-00-00 00:00:00', $newReview->timestamp);
	}

	/**
	 * Tests the create review action with invalid input.
	 */
	public function testCreateInvalid()
	{
		$note = $this->notes('note1');
		$student = $this->students('student1');

		// Empty content
		$review = new Review();
		$review->setAttributes(array(
			'content'=>null,
		));
		$this->assertFalse($note->addReview($review, $student->id));
	}
}