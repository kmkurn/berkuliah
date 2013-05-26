<?php

/**
 * Unit test for DummyUserIdentity component.
 */
class DummyUserIdentityTest extends CDbTestCase
{
	/**
	 * Tests the dummy login action.
	 */
	public function testDummyLogin()
	{
		$identity = new DummyUserIdentity(0);
		$this->assertTrue($identity->authenticate());

		$student = Student::model()->findByAttributes(array('username' => 'dummy.user'));
		$this->assertNotNull($student);
		$this->assertEquals('Dummy User', $student->name);
		$this->assertTrue($student->is_admin == 0);
		$this->assertTrue($student->faculty->id == 1);
		$this->assertNull($student->photo);
	}


	/**
	 * Tests the dummy admin login action.
	 */
	public function testDummyAdminLogin()
	{
		$identity = new DummyUserIdentity(1);
		$this->assertTrue($identity->authenticate());

		$student = Student::model()->findByAttributes(array('username' => 'dummy.admin'));
		$this->assertNotNull($student);
		$this->assertEquals('Dummy Admin', $student->name);
		$this->assertTrue($student->is_admin == 1);
		$this->assertTrue($student->faculty->id == 1);
		$this->assertNull($student->photo);
	}
}