<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Unggah Berkas',
);

?>

<div class="page-header">
</div>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<div style="width: 300px; height: 12px; margin-right:100px; margin-left:280px;" class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
	<?php echo Yii::app()->user->getFlash('message'); ?>
</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span9">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>