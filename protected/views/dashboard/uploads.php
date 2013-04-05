<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Dashboard'=>array('/dashboard'),
	'Uploads',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_noteList',
)); ?>
