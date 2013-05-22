<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $faculties array */
/* @var $form CActiveForm */

?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon icon-cog"></i> <strong>UBAH PROFIL</strong>',
)); ?>


	<?php $form = $this->beginWidget('CActiveForm', array(
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'successCssClass' => '',
			'errorCssClass' => 'error',
		),
	)); ?>

		<table class='table table-hover'>

			<?php echo Yii::app()->format->formatInputField($form, 'textField', $model, 'name', 'icon-user'); ?>
			<?php echo Yii::app()->format->formatInputField($form, 'dropDownList', $model, 'faculty_id', 'icon-briefcase',
				array(),
				array(
					'data' => CHtml::listData($faculties, 'id', 'name'),
				)
			); ?>

			<?php echo Yii::app()->format->formatInputField($form, 'textArea', $model, 'bio', 'icon-pencil'); ?>

			<?php echo Yii::app()->format->formatInputField($form, 'fileField', $model, 'file', 'icon-picture',
				array(),
				array(
					'hint' => 'Ukuran berkas maksimum 100 KB',
				)
			); ?>

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