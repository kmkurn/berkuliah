<?php
/* @var $this StudentController */
/* @var $data Testimonial */
?>

<div class="view">
	
	<table>
		<tr>
			<td>
				<br /><?php echo CHtml::encode($data->content); ?>
				<br/>
				<?php echo CHtml::link('Lihat rinci', array('testimonial/view', 'id'=>$data->id)); ?>
				<br />
				<br />
				<i class="icon icon-time"></i> <?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->timestamp))); ?>
				<br />
			</td>
		</tr>
	</table>

</div>