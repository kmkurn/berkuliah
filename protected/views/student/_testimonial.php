<?php
/* @var $this StudentController */
/* @var $data Testimonial */
?>

<div class="view">
	
	<table>
		<tr>
			<td>
				<?php echo CHtml::encode($data->content); ?>
				<br />

				<?php // TO-DO: set locale ?>
				<i class="icon icon-time"></i> <?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->timestamp))); ?>
				<br />
			</td>
		</tr>
	</table>

</div>