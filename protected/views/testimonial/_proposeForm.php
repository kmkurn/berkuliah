<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $form CActiveForm */

?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon-upload"></i> <strong>AJUKAN ARTIKEL</strong>'
)); ?>

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'photo-upload-form',
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<table class='table table-hover'>

		<tr>
			<td><i class="icon icon-zoom-in"></i> <?php echo $form->labelEx($model, 'content'); ?></td>
			<td>
				<?php echo $form->textArea($model, 'content', array('rows' => 20, 'cols' => 140)); ?>
				<?php echo $form->error($model, 'content'); ?>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<?php echo CHtml::button('Simpan sebagai draft', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
				<?php echo CHtml::link('Batal', array('testimonoal/rincian'), array('class' => 'btn')); ?>
			</td>
		</tr>

	</table>

	<?php $this->endWidget();?>

<?php $this->endWidget();?>