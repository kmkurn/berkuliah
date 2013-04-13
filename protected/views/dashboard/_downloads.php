<?php
/* @var $this DashboardController */
/* @var $data array */
?>

<div class="view">

	<span>
		Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data['title']), array('noteDetails/index', 'id'=>$data['id'])); ?> 
		pada 
		<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data['timestamp']))); ?>
	</span>

</div>