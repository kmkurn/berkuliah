<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $dataProvider CActiveDataProvider */
/* @var $review Review */

$this->pageTitle = 'Masuk';

$this->breadcrumbs=array(
	'Masuk'
);

?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">

		<?php $this->renderPartial('_login_form', array('model'=>$model)); ?>

	<p id="back-top">
		<a href="#top"><span></span>Kembali ke atas</a>
	</p>
	</div><!-- span9 -->
</div><!-- row-fluid -->