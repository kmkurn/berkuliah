<?php
/* @var $this DashboardController */
/* @var $data Note */
?>

<div class="view">
	
	<table>
		<tr>
			<td>
				<?php echo CHtml::image($data->getTypeIcon(), 'note icon', array('class' => 'note-icon')); ?>
			</td>
			<td>
				<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->title), array('noteDetails/index', 'id'=>$data->id)); ?>
				<br />

				<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
				<?php echo CHtml::encode($data->course->name); ?>
				<br />

				<b><?php echo CHtml::encode($data->getAttributeLabel('upload_timestamp')); ?>:</b>
				<?php // TO-DO: set locale ?>
				<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->upload_timestamp))); ?>
				<br />
			</td>
		</tr>
	</table>

</div>