<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $form CActiveForm */

?>

<?php echo Yii::app()->user->getNotification(); ?>


<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-gift"></i> <strong>RINCIAN TESTIMONI</strong>',
)); ?>

	<table class="table table-hover">
		<tbody>
			<tr>
				<td class="firstColumnTestimonial"><i class="icon icon-user"></i> <?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?></td>
				<td class="secondColumnTestimonial">:</td>
				<td><span class="label label-info studentUsername"><?php echo CHtml::link(CHtml::encode($model->student->username), array('student/view', 'id'=>$model->student->id)); ?></span></td>
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
				<td><?php echo Yii::app()->format->ntext($model->content); ?></td>
			</tr>

		
			<tr>
				<td width='150'></td>
				<td></td>
				<td>
					<?php

					if (Yii::app()->user->isAdmin)
					{
						if ($model->status == Testimonial::STATUS_PENDING)
						{
							echo CHtml::link('<i class="icon icon-ok icon-white"></i> Terima', '#', array(
								'class'=>'btn btn-primary',
								'confirm'=>'Apakah Anda yakin ingin menerima testimoni ini?',
								'submit'=>array('approve', 'id'=>$model->id),
							));

							echo ' ';
							echo CHtml::link('<i class="icon icon-remove icon-white"></i> Tolak', '#', array(
								'class'=>'btn btn-danger',
								'confirm'=>'Apakah Anda yakin ingin menolak testimoni ini?',
								'submit'=>array('reject', 'id'=>$model->id),
							));
						}
					}
					else if (Yii::app()->user->id == $model->student_id)
					{
						if ($model->status == Testimonial::STATUS_NEW || $model->status == Testimonial::STATUS_REJECTED)
						{
							echo CHtml::link('<i class="icon-search icon-pencil icon-white"></i> Sunting', array('update', 'id' => $model->id), array('class' => 'btn btn-primary'));
							echo ' ';
							echo CHtml::link('<i class="icon-search icon-share icon-white"></i> Usulkan', '#', array(
								'class' => 'btn btn-success',
								'confirm' => 'Apakah Anda yakin ingin mengusulkan testimoni ini?',
								'submit' => array('propose', 'id'=>$model->id),
							));
						}
					}
					
					?>
				</td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget();?>