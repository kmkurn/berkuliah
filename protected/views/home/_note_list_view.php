<?php
/* @var $this NoteController */
/* @var $data Note */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->getTypeText()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload_timestamp')); ?>:</b>
	<?php // TO-DO: set locale ?>
	<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->upload_timestamp))); ?>
	<br />
	
	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('edit_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->edit_timestamp); ?>
	<br />

	*/ ?>

</div>