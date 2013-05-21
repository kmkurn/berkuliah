<?php
/* @var $this StudentController */
/* @var $dataProvider CArrayDataProvider */
?>

<?php if (Yii::app()->user->getState('is_admin')): ?>
	<h4>Daftar Semua Testimoni</h4>
<?php else : ?>
	<h4>Daftar Testimoni</h4>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_testimonial',
)); ?>
