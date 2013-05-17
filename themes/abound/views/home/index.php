<?php

if (Yii::app()->user->hasShareMessages())
{
	echo '<div id="fb-root"></div>' . "\n";
	$script = Yii::app()->fbApi->getInitScript();
	Yii::app()->clientScript->registerScript('fb_init', $script);
}

?>

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

<div class="page-header"></div>

<br/>

<div class="row-fluid">
	<div class="span9">

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
			echo CHtml::beginForm(array('batchDelete'));
		?>

		<?php if (Yii::app()->user->hasFlash('message')): ?>
			<br />
			<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
				<?php echo Yii::app()->user->getFlash('message'); ?>
			</div>
		<?php endif; ?>

		<?php $idx = 0; ?>
		<?php foreach (Yii::app()->user->getShareMessages() as $msg): ?>
			<br />
			<br />
			<div class="alert alert-info">
				<?php echo $msg['text']; ?> 
				<a href="#" class="btn btn-info btn-small" id="fb_share<?php echo $idx; ?>">Ceritakan via Facebook</a>
			</div>

			<?php Yii::app()->clientScript->registerScript('fb_share' . $idx, Yii::app()->fbApi->getShareScript('fb_share' . $idx, $msg)); ?>
			<?php $idx++; ?>
		<?php endforeach; ?>

		<br />

		<?php $this->widget('ext.widgets.berkuliah.BkTableView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_note',
			'numColumns' => 4,
			'itemsCssClass' => 'table table-bordered',
			'emptyText' => 'Hasil pencarian tidak ditemukan.',
		)); ?>

		<br/>

		<div id="tombolHapusBerkas">
			<?php if (Yii::app()->user->getState('is_admin'))
				echo CHtml::submitButton('Hapus Berkas', array(
					'confirm' => 'Anda yakin ingin menghapus berkas-berkas yang telah Anda pilih?',
					'class' => 'btn btn-danger',
				));
			?>
		</div>

		<?php echo CHtml::endForm(); ?>

	</div><!-- span9 -->
</div><!-- row-fluid -->
