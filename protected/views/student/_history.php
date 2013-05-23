<?php
/* @var $this StudentController */
/* @var $downloadsDataProvider CArrayDataProvider */
/* @var $reviewsDataProvider CArrayDataProvider */
/* @var $ratesDataProvider CSqlDataProvider */
/* @var $reportsDataProvider CSqlDataProvider */
?>

<h4>Sejarah Pengunduhan</h4>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$downloadsDataProvider,
	'itemView'=>'_downloads',
	'itemName'=>'pengunduhan',
)); ?>

<h4>Sejarah Peninjauan</h4>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$reviewsDataProvider,
	'itemView'=>'_review',
	'itemName'=>'peninjauan',
)); ?>

<h4>Sejarah Pemberian Rating</h4>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$ratesDataProvider,
	'itemView'=>'_rate',
	'itemName'=>'pemberian rating',
)); ?>

<h4>Sejarah Pelaporan</h4>

<?php $this->widget('BkListView', array(
	'dataProvider'=>$reportsDataProvider,
	'itemView'=>'_report',
	'itemName'=>'pelaporan',
)); ?>