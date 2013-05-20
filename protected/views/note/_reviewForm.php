<?php
/* @var $this NoteController */
/* @var $model Review */

?>

<h3>Beri Tinjauan</h3>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableClientValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model, 'content'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::button('Simpan', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>