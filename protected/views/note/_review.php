<?php
/* @var $this NoteController */
/* @var $data Review */

?>

<div class="row-fluid">
  <div class="span6">
  	<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"",
	));
	?>	
	<?php
	$photo = ($data->student->photo === null) ? 'user.png' : $data->student->photo;
	echo CHtml::image(Yii::app()->baseUrl . '/photos/' . $photo, 'fotoku', array("width"=>110));
	?>
	<blockquote class="pull-left">
    <p><?php echo CHtml::encode($data->content); ?></p>
      <p><small>Oleh 
		<?php echo CHtml::link(CHtml::encode($data->student->name), array('student/view', 'id'=>$data->student_id)); ?>
		 pada 
		 <?php echo Yii::app()->format->datetime($data->timestamp); ?></small>
      </p> 
        </blockquote>       
	<?php $this->endWidget();?>
  </div>
</div>