<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div id="modeLanjutan">

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'search-dialog',
    'options'=>array(
        'title'=>'Pencarian mode lanjutan',
        'autoOpen'=>false,
        'height'=>250,
    ),
)); ?>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id' => 'advanced-search-form'
	)); ?>

		<div class="field">
			<?php echo $form->label($model,'title'); ?>
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		</div>

		<div class="field">
			<?php echo $form->label($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type', Note::getTypeNames(), array('prompt' => '(semua)')); ?>
		</div>

		<div class="field">
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

		<div class="field" id="courses">
			<?php echo $form->label($model,'course_id'); ?>
			<?php echo $form->dropDownList($model,'course_id', array(),
			array('prompt' => '(semua)')); ?>
		</div>

		<div class="field">
			<?php echo $form->label($model,'student_id'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model' => $model,
				'attribute' => 'student_id',
				'source' => $usernames,
				'htmlOptions' => array('size' => 25, 'value' => ''),
			)); ?>
		</div>

		<div class="field buttons">
			<?php echo CHtml::submitButton('Cari'); ?>
		</div>

	<?php $this->endWidget(); ?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

</div>