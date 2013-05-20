<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $faculties array */

$this->breadcrumbs=array(
	'Beri Hak Artikel',
);
?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_grantForm', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->