<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Unggah Berkas',
);

?>

<div class="page-header">
</div>

<div class="row-fluid">
	<div class="span9">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>