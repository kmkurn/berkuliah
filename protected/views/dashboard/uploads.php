<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Dasbor'=>array('profile'),
	'Unggahan',
);
?>

<h1>Daftar Unggahan <?php echo Yii::app()->user->name; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
)); ?>
