<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $form CActiveForm */

?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>


<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-gift"></i> <strong>RINCIAN TESTIMONI</strong>',
)); ?>

	<table class="table table-hover">
		<tbody>
			<tr>
				<td><i class="icon icon-user"></i> <?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::link(CHtml::encode($model->student->name), array('student/view', 'id'=>$model->student->id)); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('timestamp')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::encode(strftime('%B %Y', strtotime($model->timestamp))); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-zoom-in"></i> <?php echo CHtml::encode($model->getAttributeLabel('status')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::encode($model->getStatusString()); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-file"></i> <?php echo CHtml::encode($model->getAttributeLabel('content')); ?></td>
				<td>:</td>
				<td><?php echo $model->content; ?></td>
			</tr>

		
			<tr>
				<td width='150'></td>
				<td></td>
				<td>
					<?php

					if (Yii::app()->user->getState('is_admin'))
					{


					}
					else
					{
						if ($model->status == Testimonial::STATUS_NEW)
						{
							echo CHtml::link('<i class="icon-search icon-pencil icon-white"></i> Sunting', array('update', 'id' => $model->id), array('class' => 'btn btn-primary'));
							echo '&nbsp';
							echo CHtml::link('<i class="icon-search icon-share icon-white"></i> Usulkan', array('propose', 'id' => $model->id), array(
								'class' => 'btn btn-success',
								'confirm' => 'Apakah Anda yakin ingin mengusulkan testimoni ini?',
								));
						}
					}
					
					?>
				</td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget();?>