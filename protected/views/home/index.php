<?php

$this->breadcrumbs=array(
	'Daftar Semua Berkas',
);

$this->menu=array(
	array('label'=>'Unggah Berkas Baru', 'url'=>array('noteupload/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
");
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::submitButton('Cari', array('class' => 'row buttons')); ?>
	</div>

<?php $this->endWidget(); ?>

<br>

<?php echo CHtml::link('Pencarian Mode Lanjutan','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_advanced-search', array(
	'model' => $model,
	'usernames' => $usernames,
)); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_note',
)); ?>
