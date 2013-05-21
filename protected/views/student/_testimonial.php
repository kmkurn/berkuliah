<?php
/* @var $this StudentController */
/* @var $data Testimonial */
?>

<div class="view">
	
	<table>
		<tr>
			<td>
				<i class="icon icon-time"></i> <?php echo CHtml::link('Testimoni untuk periode ' . strftime('%B %Y', strtotime($data->timestamp)), array('testimonial/view', 'id'=>$data->id)); ?>
			</td>
		</tr>
	</table>

</div>