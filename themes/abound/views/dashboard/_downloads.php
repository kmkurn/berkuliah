<?php
/* @var $this DashboardController */
/* @var $data DownloadInfo */
?>

<div class="view">

	<span>
		Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data->note->title), array('noteDetails/index', 'id'=>$data->note->id)); ?> 
		pada 
		<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->timestamp))); ?>
	</span>

</div>