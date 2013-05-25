<?php
/* @var $this StudentController */
/* @var $data DownloadInfo */
?>

<table class="table table-hover">
	<tr>
		<td>
		<i class="icon icon-download-alt"></i> Mengunduh berkas 
		<?php echo CHtml::link(CHtml::encode($data->note->title), array('note/view', 'id'=>$data->note->id)); ?> 
		pada tanggal 
		<?php echo Yii::app()->format->datetime($data->timestamp); ?>
		</td>
	</tr>
</table>