<?php
/* @var $this StudentController */
/* @var $data Testimonial */
?>

	<table class="table table-hover">
		<tr>
			<td>
				<?php if (Yii::app()->user->getState('is_admin')) : ?>
					<i class="icon icon-user"></i> <?php echo CHtml::link($data->student->name, array('student/view', 'id' => $data->student->id)); ?>
					<br />
				<?php endif; ?>
				<i class="icon icon-time"></i> <?php echo CHtml::link('Testimoni untuk periode ' . strftime('%B %Y', strtotime($data->timestamp)), array('testimonial/view', 'id'=>$data->id)); ?>
			</td>
		</tr>
	</table>