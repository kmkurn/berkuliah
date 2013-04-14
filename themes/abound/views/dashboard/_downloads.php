<?php
/* @var $this DashboardController */
/* @var $data DownloadInfo */
?>

<div class="view">

	<span>
		<i class="icon icon-download-alt"></i> Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data->note->title), array('noteDetails/index', 'id'=>$data->note->id)); ?> 
		pada 
		<?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($data->timestamp))); ?>
	</span>

</div>