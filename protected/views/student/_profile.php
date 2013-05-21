<html>
<?php
/* @var $this StudentController */
/* @var $model Student */

?>

<body>
	<div class="row-fluid">
	<div class="span12">	
	<?php $this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'<i class="icon icon-user"></i> <strong>PROFIL ' .$model->name . '</strong>',
		)); 
	?>
	<table class="table table-hover"><tr align="center"><th rowspan="6" width="200px">
	<?php
	$photo = ($data->student->photo === null) ? 'user.png' : $model->uploadedPhoto;
	echo CHtml::image(Yii::app()->baseUrl . '/photos/' . $photo, 'fotoku', array("width"=>200,"align"=>center));
	?>
	</th>
	</tr>
	<td>
	<i class="icon icon-align-justify"></i>username
	</td>
	<td>:
	</td>
	<td><?php echo CHtml::encode($model->username);?></td>
	<tr>
	<td>
	<i class="icon icon-user"></i>Nama
	</td>
	<td>:
	</td>
	<td><?php echo CHtml::encode($model->name);?></td>
	</tr>
	<tr>
	<td>
	<i class="icon icon-book"></i>Fakultas
	</td>
	<td>:
	</td>
	<td><?php echo CHtml::encode($model->faculty->name);?></td>
	</tr>
	<tr>
	<td>
	<i class="icon icon-pencil"></i>Bio
	</td>
	<td>:
	</td>
	<td><?php echo CHtml::encode($model->bio);?></td>
	</tr>
	<tr>
	<td>
	<i class="icon icon-time"></i>Terakhir Masuk
	</td>
	<td>:
	</td>
	<td><?php echo CHtml::encode($model->last_login_timestamp);?></td>
	</tr>
</table>
		<?php $this->endWidget(); ?>
	
</div>
</div>
</body>
</html>