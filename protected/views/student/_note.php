<?php
/* @var $this StudentController */
/* @var $data Note */
?>

<div class="view">
	
	<table>
		<tr>
			<td width="40px">
				<?php echo CHtml::image(Yii::app()->baseUrl . '/' . $data->getTypeIcon(), 'note icon', array('class' => 'note-icon','height'=>'30', 'width'=>'30')); ?>
			</td>
			<td>
				<?php echo CHtml::link(CHtml::encode($data->title), array('note/view', 'id'=>$data->id)); ?>
				<br />

				<i class="icon icon-briefcase"></i> <?php echo CHtml::encode($data->course->faculty->name); ?>
				<br />

				<i class="icon icon-book"></i> <?php echo CHtml::encode($data->course->name); ?>
				<br />

				<i class="icon icon-time"></i> <?php echo CHtml::encode(Yii::app()->format->datetime($data->upload_timestamp)); ?>
				<br />
			</td>
		</tr>
	</table>

</div>