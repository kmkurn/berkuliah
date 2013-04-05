<?php
echo 'asdfdsfdsfdsf';
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note-upload',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
		<?php echo 'Fakultas' ?>
		<?php echo CHtml::dropDownList('temp_faculty_id', '', CHtml::listData(
		Faculty::model()->findAll(), 'id', 'name'), array('prompt' => 'Pilih fakultas')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->textField($model,'course_id'); ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>


	<div class="row">
		<?php echo 'Berkas'; ?>
		<?php echo CHtml::fileField('file'); ?>
	</div>


	<div class="row">
		<p>atau ketik your fucking note:</p>
	</div>


	<div class="row">
		<?php echo CHtml::textArea('raw_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Unggah'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->