<?php
/* @var $this HomeController */
/* @var $model Note */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'action' => $this->createUrl('index'),
	'method' => 'get',
	'htmlOptions' => array(
		'style' => 'float: left',
		)
)); ?>
	<?php echo $form->textField($model,'title',array(
		'maxlength' => 128,
		'class' => 'search-query',
		'placeholder' => 'Cari berkas: masukkan judul lalu tekan Enter',
	)); ?>
	
<?php $this->endWidget(); ?>