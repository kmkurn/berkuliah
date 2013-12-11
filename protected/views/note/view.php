<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $dataProvider CActiveDataProvider */
/* @var $review Review */

$this->pageTitle = 'Rincian Berkas';

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title,
);

?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<!-- Changed part from PMPL 2013: unique downloader count START -->
		<!-- Adding downloadInfoModel-->
		<?php $this->renderPartial('_view', array('model'=>$model,'downloadInfoModel'=>$downloadInfoModel)); ?>
		<!-- Changed part from PMPL 2013: unique downloader count END -->
		<?php $this->renderPartial('_reviews', array('model'=>$model,'dataProvider'=>$dataProvider)); ?>

		<?php $this->renderPartial('_reviewForm', array('note'=>$model,'model'=>$review)); ?>
		
		Rekomendasi Dokumen untuk Anda:
		<?php $this->widget('BkTableView', array(
			'dataProvider'=>$dataProvider2,
			'itemView'=>'_note',
			'numColumns' => 4,
			'itemsCssClass' => 'table table-bordered',
			'dataCssClass' => 'noteCell',
			'emptyText' => 'Hasil pencarian tidak ditemukan.',
			'itemName' => 'berkas',
		)); ?>
	<p id="back-top">
		<a href="#top"><span></span>Kembali ke atas</a>
	</p>
	</div><!-- span9 -->
</div><!-- row-fluid -->
