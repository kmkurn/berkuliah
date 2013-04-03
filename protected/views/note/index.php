<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notes',
);

$this->menu=array(
	array('label'=>'Create Note', 'url'=>array('create')),
	array('label'=>'Manage Note', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
");
?>

<h1>Notes</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::submitButton('Cari', array('class' => 'row buttons')); ?>
	</div>

<?php $this->endWidget(); ?>

<br>

<?php echo CHtml::link('Pencarian Lanjutan','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_advanced-search', array(
	'model' => $model,
)); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
