<div class="row-fluid">
	<div class="span9">
		<br/>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-search"></i> <strong>RINCIAN TESTIMONIAL</strong>',
)); ?>

	<table class="table table-hover">
		<tbody>
			<tr>
				<td><i class="icon icon-user"></i> <?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::link(CHtml::encode($model->student->name), array('student/view', 'id'=>$model->student->id)); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-zoom-in"></i> <?php echo CHtml::encode($model->getAttributeLabel('content')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::encode($model->content); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('timestamp')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->timestamp))); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-zoom-in"></i> <?php echo CHtml::encode($model->getAttributeLabel('status')); ?></td>
				<td>:</td>
				<td><?php echo CHtml::encode($model->status); ?></td>
			</tr>

		
			<tr>
				<td width='150'></td>
				<td></td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget();?>
</div>
</div>