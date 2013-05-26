<?php

/**
 * A class representing Facebook API.
 *
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class FacebookApi extends CComponent
{
	/**
	 * The Facebook application id of this application.
	 */
	public $appId;

	/**
	 * The id of the div that contains the root of this API.
	 */
	public $divRoot;


	/**
	 * The initialization method.
	 */
	public function init()
	{

	}


	/**
	 * Returns the JavaScript initialization script to be placed in HTML pages before using Facebook API.
	 * @return string the initialization script
	 */
	public function getInitScript()
	{
		return 
			"window.fbAsyncInit = function() {\n" .
			"	FB.init({\n" .
			"		appId: '$this->appId',\n" .
			"		status: true,\n" .
			"		cookie: true,\n" .
			"		xfbml: true\n" .
			"	});\n" .
			"};\n" .

			"(function() {\n" .
			"	var e = document.createElement('script');\n" .
			"	e.async = true;\n" .
			"	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';\n" .
			"	document.getElementById('$this->divRoot').appendChild(e);\n" .
			"}());\n";
	}

	/**
	 * Returns the JavaScript script for Facebook share.
	 * @param string $buttonId the id of the button of Facebook share
	 * @param array $message the message to be shared
	 * @return string the script to be used in HTML pages.
	 */
	public function getShareScript($buttonId, $message)
	{
		return 
			"$('#$buttonId').click(function(e){\n" .
			"	e.preventDefault();\n" .
			"	FB.ui({\n" .
			"		method: 'feed',\n" .
			"		name: '$message[name]',\n" .
			"		link: '" . Yii::app()->request->hostInfo . CHtml::normalizeUrl($message['link']) . "',\n" .
			"		picture: '" . Yii::app()->request->hostInfo . "/" . $message['picture'] . "',\n" .
			"		caption: '$message[caption]',\n" .
			"		description: '$message[description]',\n" .
			"		actions : [{name: 'Go to BerKuliah', link: '" . Yii::app()->request->hostInfo . CHtml::normalizeUrl(array('site/index')) . "'}],\n" .
			"		message: '$message[default_text]'\n" .
			"	});\n" .
			"});\n";
	}
}