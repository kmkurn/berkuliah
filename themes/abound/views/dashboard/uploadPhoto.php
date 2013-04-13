<?php
/* @var $this SiteController */

$this->breadcrumbs=array(
	'Akun','Foto'
);
?>
	
<div class="page-header">
</div>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<div style="width: 650px" class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
	<?php echo Yii::app()->user->getFlash('message'); ?>
</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span9">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title' => '<i class="icon icon-picture"></i> <strong>PENGATURAN FOTO</strong>',
		));
	?>
		<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'photo-upload-form',
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>
		<table class='table table-hover'>
			<tr>
				<td width='150' height='150'>
					<?php echo CHtml::image('photos/' . (Yii::app()->user->getState('photo') === null ? 'user.png' : Yii::app()->user->getState('photo')), 'foto pengguna', array("width"=>150)); ?>
				</td>

				<td>
				
				<?php echo $form->labelEx($model, 'photo'); ?>
				<?php echo $form->fileField($model, 'photo'); ?>
				<?php echo $form->error($model, 'photo'); ?>
				<br />
				<?php echo CHtml::button('Ganti', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
				</td>
			</tr>
		</table>
				
		<?php $this->endWidget('CActiveForm'); ?>
	<?php $this->endWidget('zii.widgets.CPortlet'); ?>
	</div>
</div>