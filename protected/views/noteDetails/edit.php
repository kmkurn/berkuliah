<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title => array('index', 'id' => $model->id),
	'Sunting',
);

?>

<h1><?php echo $model->title; ?></h1>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<h5><?php echo Yii::app()->user->getFlash('message'); ?></h5>
<?php endif; ?>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>