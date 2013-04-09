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
	'title' => 'Sunting Berkas'
	));
?>

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
			<?php
			$this->beginWidget('zii.widgets.jui.CJuiButton', array(
				'name'=>'saveButton',
				'buttonType' => 'submit',
				'caption' => 'Simpan',
				'htmlOptions'=> array('class'=>'btn btn-mini btn-primary'),
			));
			$this->endWidget(); ?>
			<?php
			$this->beginWidget('zii.widgets.jui.CJuiButton', array(
				'name'=>'backButton',
				'buttonType' => 'link',
				'caption' => 'Kembali',
				'url' => array('index', 'id' => $model->id),
				'htmlOptions'=> array('class'=>'btn btn-mini'),
			));
			$this->endWidget(); ?>
			</td>
		</tr>
		<?php $this->endWidget();?>
	</table>
<?php $this->endWidget();?>