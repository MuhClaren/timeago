<?php

	namespace mop\timeago\tests\system;

	require_once dirname(__FILE__).'/../../../../../includes/functions.php';

	class simple_test extends \phpbb_test_case
	{
		/** @var \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\DependencyInjection\ContainerInterface */
		protected $container;

		/** @var \PHPUnit_Framework_MockObject_MockObject|\phpbb\finder */
		protected $extension_finder;

		/** @var \PHPUnit_Framework_MockObject_MockObject|\phpbb\db\migrator */
		protected $migrator;

	}
