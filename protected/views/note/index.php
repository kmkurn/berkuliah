<?php
/* @var $this NoteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notes',
);

$this->menu=array(
	array('label'=>'Create Note', 'url'=>array('create')),
	array('label'=>'Manage Note', 'url'=>array('admin')),
);
?>

<h1>Notes</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cari'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
