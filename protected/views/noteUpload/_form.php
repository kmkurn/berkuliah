<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note-upload',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model, 'description'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'faculty_id'); ?>
		<?php echo $form->dropDownList($model, 'faculty_id',
			       CHtml::listData(Faculty::model()->findAll(), 'id', 'name'),
			       array('prompt' => 'Pilih fakultas',
			             'ajax' => array('type' => 'POST',
			             	             'url' => array('noteUpload/updateCourses'),
			             	             'update' => '#courses',
			             	             'data' => array('faculty_id' => 'js:this.value')
			                           		 ))); ?>
		<?php echo $form->error($model, 'faculty_id'); ?>
	</div>

	<div id="courses" class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->dropDownList($model, 'course_id', array(), 
				   array('prompt' => 'Pilih mata kuliah')); ?>
		<?php echo $form->error($model, 'course_id'); ?>
	</div>

	<div class="row">
		atau masukkan mata kuliah baru: 
		<?php echo $form->textField($model, 'new_course_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'file'); ?>
		<?php echo $form->fileField($model, 'file'); ?>
		<?php echo $form->error($model, 'file'); ?>
	</div>


	<div class="row">
		<p>atau ketikkan catatan Anda:</p>
	</div>


	<div class="row">
		<?php echo $form->textArea($model, 'raw_file_text'); ?>
		<?php echo $form->error($model, 'raw_file_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Unggah'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->