
<div class="page-header">
</div>
<?php
/* @var $this HomeController */
/* @var $model Note */
/* @var $usernames array */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name;

$this->breadcrumbs=array(
	'Daftar Berkas',
	);

Yii::app()->clientScript->registerScript('advanced-search', "
	$('#search-link').click(function(){
		$('#search-dialog').dialog('option','position','center').dialog('open');
		return false;
	});
");
?>

<br/>

<div class="row-fluid">
	<div class="span6">
		<?php $this->renderPartial('_basic', array(
			'model' => $model,
			)); ?>

		<?php echo CHtml::link('Pencarian lanjutan', '#myModal', array(
			'role' => 'button',
			'class' => 'btn',
			'data-toggle' => 'modal',
			)); ?>

		<?php $this->renderPartial('_advanced', array(
			'model' => $model,
			'usernames' => $usernames,
			)); ?>

		<?php if (Yii::app()->user->getState('is_admin'))
		echo CHtml::beginForm(array('batchDelete')); ?>

		<?php if (Yii::app()->user->hasFlash('message')): ?>
		<div style="width: 850px" class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
		</div>
		<?php endif; ?>
		<?php $this->widget('ext.widgets.berkuliah.BkTableView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_note',
		'numColumns' => 5,
		'itemsCssClass' => 'table table-bordered',
		'dataCssClass' => 'dataBerkas',
		'rowCssClass' => 'barisBerkas'
		)); ?>
		<br/>
		<div id ="tombolHapusBerkas">
		<?php if (Yii::app()->user->getState('is_admin'))
		echo CHtml::submitButton('Hapus Berkas', array(
			'onclick' => 'return confirm("Anda yakin ingin menghapus berkas-berkas yang telah Anda pilih?");',
			'class' => 'btn btn-danger',
			));
		echo CHtml::endForm();
		?>
	</div>
	</div>
</div>
