<?php
/* @var $this NoteController */
/* @var $model Note */

$this->pageTitle = 'Unggah Berkas';

$this->breadcrumbs=array(
	'Unggah Berkas',
);

?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_uploadForm', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->