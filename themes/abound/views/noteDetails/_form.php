<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<div style="width: 524px" class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
	<?php echo Yii::app()->user->getFlash('message'); ?>
</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<strong>Halaman Sunting Berkas</strong>'
	));
?>
	<label>Isian dengan tanda * harus diisi.</label>
	<table class='table table-hover'>
	<?php $form=$this->beginWidget('CActiveForm'); ?>
		<tr>
			<td width="270"><?php echo $form->labelEx($model, 'title'); ?></td>
			<td><?php echo $form->textField($model, 'title', array('maxlength'=>128)); ?>
				<?php echo $form->error($model, 'title'); ?></td>
		</tr>

		<tr>
			<td width="270"><?php echo $form->labelEx($model, 'description'); ?></td>
			<td><?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
				<?php echo $form->error($model, 'description'); ?></td>
		</tr>

		<tr>
			<td></td>
			<td>

			<?php echo CHtml::submitButton('Simpan', array('class' => 'btn btn-primary')); ?>
			<?php echo CHtml::link('Batal', array('index', 'id' => $model->id), array('class' => 'btn')); ?>
			
			</td>
		</tr>
		<?php $this->endWidget();?>
	</table>
<?php $this->endWidget();?>