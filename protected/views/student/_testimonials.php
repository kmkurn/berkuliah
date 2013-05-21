<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
?>

<h4>Daftar Testimoni</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_testimonial',
)); ?>
