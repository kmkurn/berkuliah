<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $usernames array */

$this->breadcrumbs=array(
	'Beri Hak Testimoni',
);
?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		<?php $this->renderPartial('_grantForm', array('model'=>$model, 'usernames'=>$usernames)); ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->