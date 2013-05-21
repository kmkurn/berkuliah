<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $dataProvider CActiveDataProvider */

?>

<?php
$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-comment"></i> <strong>TINJAUAN ARTIKEL</strong>',
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_review',
	'itemsCssClass'=>'review-items',
	'summaryText'=>'',
	'emptyText'=>'Belum ada tinjauan.',
)); ?>

<?php $this->endWidget();?>