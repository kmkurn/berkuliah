<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $faculties array */

$this->pageTitle = 'Pengaturan Profil';

$this->breadcrumbs=array(
	'Pengaturan Profil',
);
?>
	
<div class="page-header"></div>
	<div class="row-fluid">
		<div class="span9">
			<?php $this->renderPartial('_form', array(
			'model'=>$model,
			'faculties'=>$faculties,
		)); ?>
	</div>
</div>