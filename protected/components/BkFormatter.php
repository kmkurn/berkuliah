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


	public function formatInputField($form, $type, $model, $attribute, $icon, $htmlOptions = array(), $otherOptions = array())
	{
		echo '<tr>
				<td>
					<div class="control-group attribute-' . $attribute . '">
						<i class="icon ' . $icon . '"></i> ' . $form->labelEx($model, $attribute, array('class' => 'control-label')) . '
					</div>
				</td>
				<td>
					<div class="control-group attribute-' . $attribute . '">' .
						@$otherOptions['beforeInput'] . 
						(isset($otherOptions['data']) ?
							$form->$type($model, $attribute, $otherOptions['data'], $htmlOptions) : 
							$form->$type($model, $attribute, $htmlOptions)) . 
						@$otherOptions['afterInput'] .
						(isset($otherOptions['hint']) ?
							'<span class="hint">' . $otherOptions['hint'] . '</span>' :
							'').
						$form->error($model, $attribute, array('inputContainer' => '.attribute-' . $attribute)) . '
					</div>
				</td>
			</tr>';
	}
}