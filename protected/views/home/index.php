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

<?php

if (Yii::app()->user->hasShareMessages())
{
	echo '<div id="' . Yii::app()->fbApi->divRoot . '"></div>' . "\n";
	$script = Yii::app()->fbApi->getInitScript();
	Yii::app()->clientScript->registerScript('fb_init', $script);
}

?>

<div class="page-header"></div>

<br/>

<div class="row-fluid">
	<div class="span9">

		<?php $this->renderPartial('_basic', array(
			'model' => $model,
		)); ?>

		&nbsp;&nbsp;
		<?php echo CHtml::link('<i class="icon icon-search"></i> Pencarian lanjutan', '#myModal', array(
			'role' => 'button',
			'class' => 'btn',
			'data-toggle' => 'modal',
		)); ?>

		<?php $this->renderPartial('_advanced', array(
			'model' => $model,
			'usernames' => $usernames,
		)); ?>

		<?php if (Yii::app()->user->getState('is_admin')) echo CHtml::beginForm(array('batchDelete')); ?>

		<br />
		<?php echo Yii::app()->user->getNotification(); ?>

		<br />
		<br />

			<?php if (Yii::app()->user->isAdmin): ?>
				<div id="tombolHapusBerkas">
				<?php echo CHtml::submitButton('Hapus Berkas', array(
						'confirm' => 'Anda yakin ingin menghapus berkas-berkas yang telah Anda pilih?',
						'class' => 'btn btn-danger',
				)); ?>
				</div>
			<?php endif; ?>

		<br/>

		<?php $idx = 0; ?>
		<?php foreach (Yii::app()->user->getShareMessages() as $msg): ?>
		<div class="alert alert-info">
			<?php echo $msg['text']; ?> 
			<?php echo Chtml::link('<i class="icon icon-thumbs-up icon-white"></i> Ceritakan via Facebook', '#', array(
				'class' => 'btn btn-info btn-small',
				'style' => 'float: right',
				'id' => 'fb_share' . $idx,
				)); ?>
			<?php echo Chtml::link('<i class="icon icon-edit icon-white"></i> Ceritakan via Twitter', '#', array(
				'class' => 'btn btn-info btn-small',
				'style' => 'float: right; margin-right: 10px',
				'id' => 'twitter_share' . $idx,
				'data-via' => 'twitterapi',
				'data-lang' => 'en',
				)); ?>
		</div>

		<?php Yii::app()->clientScript->registerScript('fb_share' . $idx, Yii::app()->fbApi->getShareScript('fb_share' . $idx, $msg)); ?>
		<?php Yii::app()->clientScript->registerScript('twitter_share' . $idx, Yii::app()->twitterApi->getShareScript('twitter_share' . $idx, $msg)); ?>
		<?php $idx++; ?>

		<?php endforeach; ?>

		<?php $this->widget('BkTableView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_note',
			'numColumns' => 4,
			'itemsCssClass' => 'table table-bordered noteCell',
			'emptyText' => 'Hasil pencarian tidak ditemukan.',
			'itemName' => 'berkas',
		)); ?>

		<?php if (Yii::app()->user->isAdmin): ?>
			<div id="tombolHapusBerkas">
				<?php echo CHtml::submitButton('Hapus Berkas', array(
					'confirm' => 'Anda yakin ingin menghapus berkas-berkas yang telah Anda pilih?',
					'class' => 'btn btn-danger',
				)); ?>
			</div>
		<?php endif; ?>

		<?php if (Yii::app()->user->isAdmin) echo CHtml::endForm(); ?>

	</div><!-- span9 -->
</div><!-- row-fluid -->
