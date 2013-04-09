<?php
/* @var $this DashboardController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
)); ?>
