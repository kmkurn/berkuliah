<?php

$this->breadcrumbs=array(
	'Daftar Semua Berkas',
);

$this->menu=array(
	array('label'=>'Unggah Berkas Baru', 'url'=>array('noteUpload/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
");
?>

<?php $this->renderPartial('_basic', array(
	'model' => $model,
)); ?>

<br />

<?php echo CHtml::link('Pencarian Mode Lanjutan','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_advanced', array(
	'model' => $model,
	'usernames' => $usernames,
)); ?>
</div>

<?php if (Yii::app()->user->hasFlash('message')) :?>
<h3><?php echo Yii::app()->user->getFlash('message'); ?></h3>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
)); ?>
