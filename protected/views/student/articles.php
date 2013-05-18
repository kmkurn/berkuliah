<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
?>

<h4>Artikel Penghargaan</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_articles',
)); ?>
