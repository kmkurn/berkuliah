<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php if (Yii::app()->user->isAdmin): ?>
	<h4>Daftar Semua Testimoni</h4>
<?php else : ?>
	<h4>Daftar Testimoni</h4>
<?php endif; ?>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_testimonial',
	'itemName'=>'testimoni',
)); ?>