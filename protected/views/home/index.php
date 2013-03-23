<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);

?>

<div class="form">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
	<?php echo CHtml::activeTextField($model, 'keyword') ?>
	</div>
	<div class="row submit">
	<?php echo CHtml::submitButton('Cari'); ?>
	</div>
	<?php echo CHtml::endForm(); ?>
</div><!-- form -->

