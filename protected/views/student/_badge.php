<?php
/* @var $this StudentController */
/* @var $data Badge */

$baseUrl = Yii::app()->request->baseUrl;
$badgePath = Yii::app()->params['badgeIconsDir'];

?>

<div id="iconBerkas">
	<?php echo CHtml::image($baseUrl . '/' . $badgePath . $data->location,
		CHtml::encode($data->name),
		array('class' => 'badge-icon',"width"=>50,"height"=>50)); ?>
</div>

<div id="labelBadge">
	<?php echo CHtml::encode($data->name); ?>
</div>