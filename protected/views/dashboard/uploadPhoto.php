<?php 
/* @var $this DashboardController */
/* @var $model PhotoUploadForm */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Dasbor' => array('profile'),
	'Ubah Foto',
);

?>

<h1>Ubah Foto</h1>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<h3><?php echo Yii::app()->user->getFlash('message'); ?></h3>
<?php endif; ?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'photo-upload-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model, 'photo'); ?>
		<?php echo $form->fileField($model, 'photo'); ?>
		<?php echo $form->error($model, 'photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>