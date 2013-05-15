<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title => array('index', 'id' => $model->id),
	'Sunting',
);

?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_edit_form', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->