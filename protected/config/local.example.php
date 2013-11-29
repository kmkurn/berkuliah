<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=berkuliah',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'password',
				'charset' => 'utf8',
			),
		),
	)
);

