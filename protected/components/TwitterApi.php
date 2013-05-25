<?php

/**
 * TwitterApi respresents Twitter API.
 *
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class TwitterApi extends CComponent
{
	/**
	 * The Twitter username of this application.
	 */
	public $username;


	/**
	 * The initialization method.
	 */
	public function init()
	{

	}

	/**
	 * Returns the JavaScript script for Twitter share.
	 * @param string $buttonId the id of the button of Twitter share
	 * @param array $message the message to be shared
	 * @return string the script to be used in HTML pages.
	 */
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