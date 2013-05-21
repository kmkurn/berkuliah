<?php
/* @var $this NoteController */
/* @var $model Review */
/* @var $note Note */

?>
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'<i class="icon icon-edit"></i> <strong>BERI TINJAUAN</strong>',
	));
	?>	
<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
)); ?>

	<div class="row-fluid">
		<div class="span6">
			<?php echo $form->textArea($model, 'content',array('class'=>'input-block-level','rows'=>'10','cols'=>'50')); ?>
			<?php echo $form->error($model, 'content'); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
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
	</div>

<?php $this->endWidget(); ?>

<?php $this->endWidget();?>