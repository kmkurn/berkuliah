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

		<?php $this->renderPartial('_view', array('model'=>$model)); ?>

		<?php $this->renderPartial('_reviews', array('model'=>$model,'dataProvider'=>$dataProvider)); ?>

		<?php $this->renderPartial('_reviewForm', array('note'=>$model,'model'=>$review)); ?>
	<p id="back-top">
		<a href="#top"><span></span>Kembali ke atas</a>
	</p>
	</div><!-- span9 -->
</div><!-- row-fluid -->