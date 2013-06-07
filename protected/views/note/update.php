<?php
/* @var $this NoteController */
/* @var $model Note */

$this->pageTitle = 'Sunting Berkas';

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title => array('view', 'id' => $model->id),
	'Sunting',
);

?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_updateForm', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->