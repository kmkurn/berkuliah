<?php

/**
 * A custom formatter class.
 */
class BkFormatter extends CFormatter
{
	/**
	 * Stores the html options for formatting an image.
	 * @var array
	 */
	public $imageFormat;

	/**
	 * Formats the given value as an image tag.
	 * @param  string $value the url of the image
	 * @return string the formatted result
	 */
	public function formatImage($value)
	{
		return CHtml::image($value, 'image', array(
			'width'=>$this->imageFormat['width'],
			'height'=>$this->imageFormat['height'],
		));
	}
}