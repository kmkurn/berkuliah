<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Notes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Note', 'url'=>array('index')),
	array('label'=>'Create Note', 'url'=>array('create')),
	array('label'=>'Update Note', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Note', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Note', 'url'=>array('admin')),
);
?>

<h1>View Note #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'type',
		'location',
		'course_id',
		'student_id',
		'upload_timestamp',
		'edit_timestamp',
	),
)); ?>
