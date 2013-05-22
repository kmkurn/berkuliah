<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $usernames array */

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

	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'successCssClass' => '',
			'errorCssClass' => 'error',
		),
	)); ?>
	
	<table class='table table-hover'>

			<tr>
				<td width="270"><i class="icon icon-tag"></i> <?php echo $form->labelEx($model, 'student_id'); ?></td>
				<td>
					<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'=>$model,
						'attribute'=>'student_id',
						'source'=>$usernames,
					)); ?>
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<?php echo CHtml::submitButton('Beri Hak', array(
						'class' => 'btn btn-primary',
						'confirm'=>'Apakah Anda yakin memberikan hak penulisan testimoni pada mahasiswa ini?',
					)); ?>
					<?php echo CHtml::link('Batal', array('home/index'), array('class' => 'btn')); ?>
				</td>
			</tr>


		</table>
	<?php $this->endWidget();?>

<?php $this->endWidget();?>