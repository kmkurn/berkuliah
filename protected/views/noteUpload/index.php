<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Unggah Berkas Baru',
);

?>

<?php
foreach(Yii::app()->user->getFlashes() as $key => $message)
{
	echo '<h3>' . $message . "</h3>\n";
}
?>

<h1>Unggah Berkas Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>