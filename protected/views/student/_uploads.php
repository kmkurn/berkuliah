<?php
/* @var $this StudentController */
/* @var $dataProvider CArrayDataProvider */
?>

<h4>Daftar Pengunggahan</h4>
<?php $this->widget('BkListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
	'itemName'=>'unggahan',
)); ?>