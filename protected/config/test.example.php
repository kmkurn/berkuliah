<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=berkuliah_test',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'root',
				'charset' => 'utf8',
			),
		),
		'params'=>array(
			'noteIconsDir'=>'/path/to/berkuliah/images/', // note the trailing slash!
			'badgeIconsDir'=>'/path/to/berkuliah/images/badges/', // note the trailing slash!
		),
	)
);