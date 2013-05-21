<?php
/* @var $this NoteController */
/* @var $model Review */
/* @var $note Note */

?>

<h3>Beri Tinjauan</h3>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
)); ?>

	<div class="row">
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model, 'content'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::ajaxSubmitButton('Simpan',
			CHtml::normalizeUrl(array('note/review')),
			array(
				'data'=>'js:$("#review-form").serialize()+"&note_id='.$note->id.'"',
				'success'=>'function(msg) {
					$(".review-items").append(msg);
				}',
			),
			array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>