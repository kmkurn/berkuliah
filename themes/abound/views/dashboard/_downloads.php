<?php
/* @var $this DashboardController */
/* @var $data Note */
?>

<div class="view">

	<span>
		Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data->title), array('noteDetails/index', 'id'=>$data->id)); ?> 
		pada 
		<?php
		$timestamp = $data->getDownloadTimestamp(Yii::app()->user->id);
		echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($timestamp)));
		?>
	</span>

</div>