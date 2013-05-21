<?php
/* @var $this NoteController */
/* @var $data Note */

$baseUrl = Yii::app()->request->baseUrl;
?>

<?php if (Yii::app()->user->getState('is_admin')) echo CHtml::checkBox('deleteNote[' . $data->id . ']'); ?>

<div id="iconBerkas">
	<?php echo CHtml::image($baseUrl . '/' . $data->typeIcon, 'note icon', array('class' => 'note-icon',"width"=>50,"height"=>50)); ?>
</div>

<br />

<?php echo CHtml::link(CHtml::encode($data->title), array('note/view', 'id'=>$data->id)); ?>
<br />

<i class="icon icon-user"></i> <?php echo CHtml::link(CHtml::encode($data->student->name),
	array('student/view', 'id'=>$data->student->id)); ?>
<br />

<i class="icon icon-briefcase"></i> <?php echo CHtml::encode($data->course->faculty->name); ?>
<br />

<i class="icon icon-book"></i> <?php echo CHtml::encode($data->course->name); ?>
<br />

<?php // TO-DO: set locale ?>
<i class="icon icon-time"></i> <?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->upload_timestamp))); ?>
<br />

<?php if (Yii::app()->user->getState('is_admin')): ?>
	<i class="icon icon-flag"></i> <?php echo CHtml::encode($data->reportCount); ?>
	<br />
<?php endif; ?>