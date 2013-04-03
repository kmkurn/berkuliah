<?php

class NoteTest extends CDbTestCase
{
	public $fixtures = array(
		'notes' => 'Note',
	);

	public function testCreate()
	{
		$newNoteTitle = 'Test New Note';
		$newNote = new Note;
		$newNote->setAttributes(
			array(
				'title' => $newNoteTitle,
				'description' => 'This is a new note description.',
				'type' => 0,
				'location' => '',
				'course_id' => 3,
				'student_id' => 3,
				'upload_timestamp' => '',
				'edit_timestamp' => '',
			)
		);
		$this->assertTrue($newNote->save(FALSE));

		$retrievedNote = Note::model()->findByPk($newNote->id);
		$this->assertTrue($retrievedNote instanceof Note);
		$this->assertEquals($retrievedNote->title, $newNoteTitle);
	}

	public function testRead()
	{
		$note = $this->notes('note1');
		$retrievedNote = Note::model()->findByPk($note->id);
		$this->assertTrue($retrievedNote instanceof Note);
		$this->assertEquals($retrievedNote->title, $note->title);
	}

	public function testUpdate()
	{
		$updatedNote = $this->notes('note2');
		$updatedNote->description = 'This is an updated note description.';
		$this->assertTrue($updatedNote->save(FALSE));

		$retrievedNote = Note::model()->findByPk($updatedNote->id);
		$this->assertTrue($retrievedNote instanceof Note);
		$this->assertEquals($retrievedNote->description, $updatedNote->description);
	}

	public function testDelete()
	{
		$deletedNote = $this->notes('note3');
		$this->assertTrue($deletedNote->delete());

		$retrievedNote = Note::model()->findByPk($deletedNote->id);
		$this->assertEquals($retrievedNote, NULL);
	}

	public function testGetTypeOptions()
	{
		$note = $this->notes('note1');
		$options = $note->getTypeOptions();
		$this->assertTrue(is_array($options));
		$this->assertEquals(count($options), 3);
		$this->assertTrue(in_array('PDF', $options));
		$this->assertTrue(in_array('Gambar', $options));
		$this->assertTrue(in_array('Teks', $options));
	}
}