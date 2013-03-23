<?php

class SearchForm extends CFormModel
{
	public $keyword;

	public function rules()
	{
		return array(
			array('keyword', 'safe'),
		);
	}
	
}
