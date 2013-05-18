<?php

/**
 * TwitterApi respresents Twitter API.
 */
class TwitterApi extends CComponent
{
	public $username;

	public function init()
	{

	}

	public function getShareScript($buttonId, $message)
	{
		return 
			"$('#$buttonId').click(function(){" .
			"	window.open('https://twitter.com/share?" .
					"url=" . urlencode(Yii::app()->request->hostInfo . CHtml::normalizeUrl($message['link'])) . "&" .
					"text=" . urlencode($message['default_text']) . "&" .
					"via=$this->username" .
			"	');" .
			"});";
	}
}