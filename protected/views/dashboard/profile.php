<?php
/* @var $this DashboardController */
/* @var $downloadsDataProvider CArrayDataProvider */

$this->breadcrumbs=array(
	'Dasbor',
);
?>
<h1>Sejarah Kegiatan <?php echo Yii::app()->user->name; ?></h1>

<br />

<h2>Sejarah Pengunduhan</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$downloadsDataProvider,
	'itemView'=>'_downloads',
)); ?>
