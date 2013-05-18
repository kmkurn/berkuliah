<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	Yii::app()->user->name,
	'Ubah Profil',
);
?>
	
<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	</div><!-- span9 -->
</div><!-- row-fluid -->