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
		'ext.berkuliah.*',
	),

	'modules'=>array(
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
			'appId' => 'FACEBOOK_APP_ID',
			'divRoot' => 'fb-root',
		),
		'twitterApi'=>array(
			'class' => 'TwitterApi',
			'username' => 'BerKuliah',
		),
		'format'=>array(
			'class'=>'BkFormatter',
			'datetimeFormat'=>'d-m-Y, H:i:s',
		),
        'hybridAuth'=>array(
            'class'=>'ext.widgets.hybridAuth.CHybridAuth',
            'enabled'=>true, // enable or disable this component
            'config'=>array(
                 "base_url" => "http://162.243.144.83/index.php/path/to/hybriadauth", 
                 "providers" => array(
//                       "Google" => array(
//                            "enabled" => false,
//                            "keys" => array("id" => "", "secret" => ""),
//                        ),
                       "Facebook" => array(
                            "enabled" => true,
                            "keys" => array("id" => "VAR_APP_ID", "secret" => "VAR_APP_SECRET"),
                        ),
//                       "Twitter" => array(
//                            "enabled" => false,
//                            "keys" => array("key" => "", "secret" => "")
//                       ),
                 ),
                 "debug_mode" => false,
                 "debug_file" => "debug.log",
             ),
         ),//end hybridAuth

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'itemsPerPage'=>5,
		'notesDir'=>'notes/',
		'noteIconsDir'=>'images/',
		'photosDir'=>'photos/',
		'badgeIconsDir'=>'images/badges/',
		'defaultProfilePhoto'=>'user.png',
	),
);
