<?php 

$this->breadcrumbs=array(
	'Ubah Foto Profil',
);

?>

<h1>Ubah Foto Profil</h1>

<?php

if (Yii::app()->user->hasFlash('message'))
	echo '<h3>' . Yii::app()->user->getFlash('message') . "</h3>\n";

?>


<div class="form">

<?php echo CHtml::beginForm('', 'post', array(
	'id'=>'uploadPhoto',
	'enctype' => 'multipart/form-data')); ?>


	<div class="row">
		<?php echo CHtml::label('Foto', false); ?>
		<?php echo CHtml::fileField('photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Ubah'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div>