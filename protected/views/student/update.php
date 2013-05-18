<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $faculties array */

$this->breadcrumbs=array(
	'Ubah Profil',
);
?>
	
<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		
	<?php $this->renderPartial('_form', array(
		'model'=>$model,
		'faculties'=>$faculties,
	)); ?>

	</div><!-- span9 -->
</div><!-- row-fluid -->