<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */

$this->pageTitle = 'Rincian Testimoni';

$this->breadcrumbs=array(
	$model->student->username => array('student/view', 'id'=>$model->student->id),
	'Testimoni ' . strftime('%B %Y', strtotime($model->timestamp)),
);

?>


<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_view', array('model'=>$model)); ?>
	</div><!-- span9 -->
	<div class="span9">
		<?php //$this->renderPartial('_proposeForm', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->
