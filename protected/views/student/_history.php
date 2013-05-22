<?php
/* @var $this StudentController */
/* @var $dataProvider CArrayDataProvider */
?>

<h4>Sejarah Pengunduhan</h4>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_downloads',
	'itemName'=>'pengunduhan',
)); ?>
