<?php
/* @var $this StudentController */
/* @var $data Testimonial */
?>

<div class="view">
	
	<table>
		<tr>
			<td>
				<?php if (Yii::app()->user->getState('is_admin')) : ?>
					<i class="icon icon-user"></i> <?php echo CHtml::link($data->student->name, array('student/view', 'id' => $data->id)); ?>
					<br />
				<?php endif; ?>
				<i class="icon icon-time"></i> <?php echo CHtml::link('Testimoni untuk periode ' . strftime('%B %Y', strtotime($data->timestamp)), array('testimonial/view', 'id'=>$data->id)); ?>
			</td>
		</tr>
	</table>

</div>