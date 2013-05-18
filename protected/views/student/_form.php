<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon icon-picture"></i> <strong>UBAH PROFIL</strong>',
)); ?>

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'update-form',
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

		<table class='table table-hover'>

			<tr>
				<td width="270"><?php echo $form->labelEx($model, 'name'); ?></td>
				<td>
					<?php echo $form->textField($model, 'name'); ?>
					<?php echo $form->error($model, 'name'); ?>
				</td>
			</tr>

			<tr>
				<td width="270"><?php echo $form->labelEx($model, 'faculty_id'); ?></td>
				<td>
					<?php echo $form->dropDownList($model, 'faculty_id', CHtml::listData($faculties,'id','name')); ?>
					<?php echo $form->error($model, 'faculty_id'); ?>
				</td>
			</tr>

			<tr>
				<td width="270"><?php echo $form->labelEx($model, 'bio'); ?></td>
				<td>
					<?php echo $form->textArea($model, 'bio'); ?>
					<?php echo $form->error($model, 'bio'); ?>
				</td>
			</tr>

			<tr>
				<td width="270"><?php echo $form->labelEx($model, 'uploadedPhoto'); ?></td>
				<td>	
					<?php echo $form->fileField($model, 'uploadedPhoto'); ?>
					<?php echo $form->error($model, 'uploadedPhoto'); ?>
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<?php echo CHtml::button('Ganti', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
					<?php echo CHtml::link('Batal', array('home/index'), array('class' => 'btn')); ?>
				</td>
			</tr>

		</table>
			
	<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>