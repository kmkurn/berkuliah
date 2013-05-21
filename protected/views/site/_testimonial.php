<?php
/* @var $this SiteController */
/* @var $model Testimonial */

?>

<div class="row-fluid">
	<div class="span12">

		<blockquote class="pull-left">
			<p><?php echo CHtml::encode($model->content); ?></p>
		</blockquote>
		<br />
		<blockquote class="pull-right">
			<p><small>Oleh 
			<?php echo CHtml::link(CHtml::encode($model->student->name), array('student/view', 'id'=>$model->student_id)); ?>
			<br />
			<?php echo Yii::app()->format->datetime($model->timestamp); ?></small></p>
		</blockquote>

	</div>
</div>