<?php
/* @var $this StudentController */
/* @var $dataProvider CArrayDataProvider */
?>

<h4>Sejarah Pengunggahan</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
)); ?>
