<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'advanced-search-form'
)); ?>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', $model->getTypeOptions()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_id'); ?>
		<?php echo $form->dropDownList($model,'course_id', CHtml::listData(
		Course::model()->findAll(), 'id', 'name'), array('prompt' => 'Pilih mata kuliah')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_id'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model' => $model,
			'attribute' => 'student_id',
			'data' => $usernames,
			'htmlOptions' => array('size' => 25, 'value' => ''),
		)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cari'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>