<?php
/* @var $this StudentController */
/* @var $model Student */

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>$model->getAttributeLabel('uploadedPhoto'),
			'value'=>Yii::app()->baseUrl . '/photos/' . (($model->photo == null) ? 'user.png' : $model->photo),
			'type'=>'image',
			'visible'=>(Yii::app()->user->id !== $model->id),
		),
		'username:text:Username JUITA',
		'name',
		array(
			'label'=>$model->getAttributeLabel('faculty_id'),
			'value'=>(($model->faculty === null) ? null : CHtml::encode($model->faculty->name)),
			'visible'=>$model->faculty !== null,
		),
		array(
			'label'=>$model->getAttributeLabel('bio'),
			'value'=>$model->bio,
			'visible'=>$model->bio !== null,
		),
		array(
			'label'=>$model->getAttributeLabel('last_login_timestamp'),
			'value'=>Yii::app()->format->datetime($model->last_login_timestamp),
		),
	),
)); ?>