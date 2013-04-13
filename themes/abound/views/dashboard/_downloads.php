<?php
/* @var $this DashboardController */
/* @var $data Note */
?>

<div class="view">

	<span>
		<i class="icon icon-download-alt"></i> Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data['title']), array('noteDetails/index', 'id'=>$data['id'])); ?> 
		pada 
		<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data['timestamp']))); ?>
	</span>

</div>