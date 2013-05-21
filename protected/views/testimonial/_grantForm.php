<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */

?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon icon-gift"></i> <strong>BERI HAK TESTIMONI</strong>'
)); ?>

	<label>Isian dengan tanda * harus diisi.</label>
	
	<table class='table table-hover'>

		<?php $form=$this->beginWidget('CActiveForm'); ?>

			<tr>
				<td width="270"><i class="icon icon-tag"></i> <?php echo $form->labelEx($model, 'student_id'); ?></td>
				<td>
					<?php echo $form->textField($model, 'student_id'); ?>
					<?php echo $form->error($model, 'student_id'); ?>
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<?php echo CHtml::submitButton('Beri Hak', array('class' => 'btn btn-primary')); ?>
					<?php echo CHtml::link('Batal', array('home/index'), array('class' => 'btn')); ?>
				</td>
			</tr>

		<?php $this->endWidget();?>

	</table>

<?php $this->endWidget();?>