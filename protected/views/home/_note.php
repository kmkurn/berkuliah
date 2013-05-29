<?php
/* @var $this HomeController */
/* @var $data Note */

$baseUrl = Yii::app()->request->baseUrl;
?>

<?php if (Yii::app()->user->isAdmin) echo CHtml::checkBox('deleteNote[' . $data->id . ']'); ?>

<div id="iconBerkas">

	<?php echo CHtml::link(CHtml::image($baseUrl . '/' . $data->typeIcon, 'note icon', array('class' => 'noteIcon')),
		array('note/view', 'id'=>$data->id)
		); ?>
</div>

<br />

<span class="noteTitle"><?php echo CHtml::link(Yii::app()->format->text($data->title), array('note/view', 'id'=>$data->id)); ?></span>
<br />

<i class="icon icon-user"></i> <span class="label label-info studentUsername"><?php echo CHtml::link(CHtml::encode($data->student->username),
	array('student/view', 'id'=>$data->student->id)); ?></span>
<?php echo CHtml::image($baseUrl . '/' . Yii::app()->params['photosDir'] . $data->student->photo, 'photo', array('class' => 'notePhotoIcon')); ?>
<br />

<i class="icon icon-briefcase"></i> <?php echo CHtml::encode($data->course->faculty->name); ?>
<br />

<i class="icon icon-book"></i> <?php echo CHtml::encode($data->course->name); ?>
<br />

<i class="icon icon-time"></i> <?php echo Yii::app()->format->datetime($data->upload_timestamp); ?>
<br />

<?php if (Yii::app()->user->isAdmin): ?>
	<i class="icon icon-flag"></i> <?php echo CHtml::encode($data->reportCount); ?>
	<br />
<?php endif; ?>