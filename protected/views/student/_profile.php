<html>
<?php
/* @var $this StudentController */
/* @var $model Student */
?>
<body>
<div class = "profilPengguna">
	<?php $this->widget('zii.widgets.CDetailView', array(
		'cssFile' => Yii::app()->theme->baseUrl .'css/abound.css',
		'data'=>$model,
		'attributes'=>array(
			array(
				'label'=>'<i class="icon icon-camera"></i>'.$model->getAttributeLabel('uploadedPhoto'),
				'value'=>Yii::app()->baseUrl . '/photos/' . (($model->photo == null) ? 'user.png' : $model->photo),
				'type'=>'image',
				'visible'=>(Yii::app()->user->id !== $model->id),
			),
			'username:text:Username JUITA',
			'name',
			array(
				'label'=>'<i class="icon icon-book"></i>'.$model->getAttributeLabel('faculty_id'),
				'value'=>(($model->faculty === null) ? null : CHtml::encode($model->faculty->name)),
				'visible'=>$model->faculty !== null,
			),
			array(
				'label'=>'<i class="icon icon-pencil"></i>'.$model->getAttributeLabel('bio'),
				'value'=>$model->bio,
				'visible'=>$model->bio !== null,
			),
			array(
				'label'=>'<i class="icon icon-time"></i>'.$model->getAttributeLabel('last_login_timestamp'),
				'value'=>Yii::app()->format->datetime($model->last_login_timestamp),
			),
		),
	)); 
	?>
</div>
</body>
</html>