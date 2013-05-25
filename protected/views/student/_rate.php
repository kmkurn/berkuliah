<?php
/* @var $this StudentController */
/* @var $data array */

?>

<table class="table table-hover">
	<tr>
		<td>
		<i class="icon icon-star"></i> Memberi rating <?php echo CHtml::encode($data['value']); ?> pada berkas 
		<?php echo CHtml::link(CHtml::encode($data['title']), array('note/view', 'id'=>$data['note_id'])); ?> 
		pada tanggal 
		<?php echo Yii::app()->format->datetime($data['timestamp']); ?>
		</td>
	</tr>
</table>