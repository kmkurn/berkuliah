<?php
/* @var $this NoteController */
/* @var $data Review */

?>

<div class="row-fluid">
  <div class="span12">
  	<table class="table table-hover"><tr><td width="150px">
	<?php
	$photo = ($data->student->photo === null) ? 'user.png' : $data->student->photo;
	echo CHtml::image(Yii::app()->baseUrl . '/photos/' . $photo, 'fotoku', array("width"=>60));
	?>
	</td><td width="800px">
	<blockquote class="pull-left">
    <p><?php echo CHtml::encode($data->content); ?></p>
        </blockquote>  
        <br/>
        <blockquote class="pull-right">
      <p><small>Oleh 
		<?php echo CHtml::link(CHtml::encode($data->student->name), array('student/view', 'id'=>$data->student_id)); ?>
		 <br/>
		 pada 
		 <?php echo Yii::app()->format->datetime($data->timestamp); ?></small>
      </p> 
         </blokquote>
        </td></tr></table>  
  </div>
</div>