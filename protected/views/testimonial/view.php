<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */

$this->breadcrumbs=array(
	'Dasbor' => array('student/view', 'id'=>$model->id),
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
