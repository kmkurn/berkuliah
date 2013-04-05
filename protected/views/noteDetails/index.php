<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Berkas ' . $model->id,
);

?>

<h1>Halaman Rinci Berkas #<?php echo $model->id; ?></h1>

<p><?php echo CHtml::link('Unduh', array('noteDetails/download', $model->id)); ?></p>

<div class="view">


	<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($model->title); ?>
	<br />

	<b><?php echo CHtml::encode('Oleh'); ?>:</b>
	<?php echo CHtml::encode($model->student->username); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($model->description); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($model->course->name); ?>
	<br />

	<b><?php echo CHtml::encode('Fakultas'); ?>:</b>
	<?php echo CHtml::encode($model->course->faculty->name); ?>
	<br />


	<b><?php echo CHtml::encode($model->getAttributeLabel('upload_timestamp')); ?>:</b>
	<?php // TO-DO: set locale ?>
	<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->upload_timestamp))); ?>
	<br />
	
	<b><?php echo CHtml::encode($model->getAttributeLabel('edit_timestamp')); ?>:</b>
	<?php // TO-DO: set locale ?>
	<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->edit_timestamp))); ?>
	<br />


</div>