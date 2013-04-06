<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>

<p><?php echo CHtml::link('Unduh', array('download', 'id' => $model->id)); ?></p>

<?php if ($model->student_id === Yii::app()->user->id): ?>
<p><?php echo CHtml::link('Sunting', array('edit', 'id' => $model->id)); ?></p>
<p><?php echo CHtml::link('Hapus', array('delete', 'id' => $model->id), array('confirm' => 'Anda yakin ingin menghapus berkas ini?')); ?></p>
<?php endif; ?>

<div class="view">

	<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($model->title); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::encode($model->student->username); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($model->description); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($model->course->name); ?>
	<br />

	<b><?php echo CHtml::encode($model->course->getAttributeLabel('faculty_id')); ?>:</b>
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