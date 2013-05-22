<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'BerKuliah',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'c3456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'BkWebUser',
			'allowAutoLogin'=>true, // enable cookie-based authentication
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=berkuliah',
			'emulatePrepare' => true,
			'username' => 'berkuliah',
			'password' => 'c3456',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'fbApi'=>array(
			'class' => 'FacebookApi',
			'appId' => '246113138860980',
			'divRoot' => 'fb-root',
		),
		'twitterApi'=>array(
			'class' => 'TwitterApi',
			'username' => 'berkuliah',
		),
		'format'=>array(
			'class'=>'BkFormatter',
			'imageFormat'=>array(
				'width'=>100,
				'height'=>100,
			),
			'datetimeFormat'=>'d-m-Y, H:i:s',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'itemsPerPage'=>5,
		'notesDir'=>'notes/',
		'noteIconsDir'=>'images/',
		'photosDir'=>'photos/',
		'badgeIconsDir'=>'images/badges/',
	),
);
