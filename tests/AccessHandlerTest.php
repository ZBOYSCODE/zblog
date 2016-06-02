<?php

class AccessHandlerTest extends TestCase {

	public function testCheck() {

		$this->assertTrue(
			Access::check('admin', 'admin'),
			'Admin users should have access to admin modules'
		);

		$this->assertTrue(
			Access::check('admin', 'editor'),
			'Admin users should have access to editor modules'
		);

		$this->assertTrue(
			Access::check('editor', 'user'),
			'Editor should have access to user modules'
		);

		$this->assertFalse(
			Access::check('user', 'admin'),
			'Users should not have access to admin modules, routes, etc'
		);

		$this->assertFalse(
			Access::check('editor', 'admin'),
			'Editor should not have access to admin modules, routes, etc'
		);

		$this->assertFalse(
			Access::check('user', 'editor'),
			'Users should not have access to editor modules, routes, etc'
		);
	}
}