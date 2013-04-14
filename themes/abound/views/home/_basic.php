<?php
/* @var $this HomeController */
/* @var $model Note */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'action' => $this->createUrl('index'),
	'method' => 'get',
)); ?>
	<?php echo $form->textField($model,'title',array(
		'size' => 60,
		'maxlength' => 128,
		'class' => 'search-query span12',
		'placeholder' => 'Cari judul',
	)); ?>
<?php $this->endWidget(); ?>