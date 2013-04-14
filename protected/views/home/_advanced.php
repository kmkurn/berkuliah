<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id' => 'advanced-search-form',
		'action' => $this->createUrl('index'),
		'method' => 'get',
	)); ?>

		<div class="row">
			<?php echo $form->label($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type', Note::getTypeNames(), array('prompt' => '(semua)')); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'advanced_faculty_id'); ?>
			<?php echo $form->dropDownList($model,'advanced_faculty_id', CHtml::listData(
			Faculty::model()->findAll(), 'id', 'name'),
			array('prompt' => '(semua)',
				  'ajax' => array('type' => 'POST',
				             	             'url' => array('home/updateCourses'),
				             	             'update' => '#courses',
				             	             'data' => array('faculty_id' => 'js:this.value')
				                           		 ))); ?>
		</div>

		<div class="row" id="courses">
			<?php echo $form->label($model,'course_id'); ?>
			<?php echo $form->dropDownList($model,'course_id', array(),
			array('prompt' => '(semua)')); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'student_id'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model' => $model,
				'attribute' => 'student_id',
				'source' => $usernames,
				'htmlOptions' => array('size' => 25, 'value' => ''),
			)); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Cari'); ?>
		</div>

	<?php $this->endWidget(); ?>

</div>