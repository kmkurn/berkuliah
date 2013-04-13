<?php
/* @var $this HomeController */
/* @var $model Note */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::submitButton('Cari', array('class' => 'row buttons')); ?>
	</div>

<?php $this->endWidget(); ?>