<?php

$this->breadcrumbs=array(
	'Daftar Berkas',
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


<?php if (Yii::app()->user->getState('is_admin'))
		echo CHtml::beginForm(array('batchDelete')); ?>

<?php $this->widget('ext.widgets.berkuliah.BkTableView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
	'numColumns' => 2,
)); ?>

<?php if (Yii::app()->user->getState('is_admin'))
		echo CHtml::submitButton('Hapus Berkas', array('onclick' => 'return confirm("Anda yakin ingin menghapus berkas-berkas yang telah Anda pilih?");'));
		echo CHtml::endForm();
?>
