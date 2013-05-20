<?php
/* @var $this NoteController */
/* @var $data Review */

?>

<div class="review">

	<span class="reviewer">
		Oleh 
		<?php echo CHtml::link(CHtml::encode($data->student->name), array('student/view', 'id'=>$data->student_id)); ?>
		 pada 
		 <?php echo Yii::app()->format->datetime($data->timestamp); ?>
	</span>
	<br />
	<div class="review-content">
		<?php echo CHtml::encode($data->content); ?>
	</div>

</div><!-- reviewer -->