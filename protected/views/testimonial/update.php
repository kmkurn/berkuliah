<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */

$this->pageTitle = 'Sunting Testimoni';

$this->breadcrumbs=array(
	$model->student->username => array('student/view', 'id'=>$model->student->id),
	'Testimoni ' . strftime('%B %Y', strtotime($model->timestamp)) => array('testimonial/view', 'id'=>$model->id),
	'Sunting',
);

?>


<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_updateForm', array('model'=>$model)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->
