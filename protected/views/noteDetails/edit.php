<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Sunting Berkas',
);

?>

<h1>Sunting Berkas #<?php echo $model->id; ?></h1>

<?php

if (Yii::app()->user->hasFlash('message'))
	echo '<h3>' . Yii::app()->user->getFlash('message') . "</h3>\n";

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>