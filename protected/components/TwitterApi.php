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
			"	', '" . $buttonId . "', 'status=0,toolbar=0,menubar=0,scrollbars=1,location=0,resizable=0,width=500,height=300');" .
			"});";
	}
}