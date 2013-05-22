<?php
/* @var $this StudentController */
/* @var $dataProvider CArrayDataProvider */
?>

<h4>Daftar Lencana</h4>

<?php $this->widget('BkTableView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_badge',
	'numColumns'=>4,
	'itemsCssClass' => 'table table-bordered',
	'itemName'=>'lencana',
)); ?>
