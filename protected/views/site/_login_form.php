<?php echo Yii::app()->user->getNotification(); ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon icon-off"></i> <strong>MASUK</strong>',
)); ?>


	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'successCssClass' => '',
			'errorCssClass' => 'error',
		),
	)); ?>

		<table class='table table-hover'>

			<?php echo Yii::app()->format->formatInputField($form, 'textField', $model, 'username', 'icon-user'); ?>
			<?php echo Yii::app()->format->formatInputField($form, 'passwordField', $model, 'password', 'icon-user'); ?>
			
			<tr>
				<td></td><td><em>BerKuliah tidak pernah menyimpan password Anda.</em></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<?php echo CHtml::tag('button', array('type' => 'submit', 'class' => 'btn btn-primary'), '<i class="icon icon-off icon-white"></i> Masuk'); ?>
				</td>
			</tr>


		</table>
			
	<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>