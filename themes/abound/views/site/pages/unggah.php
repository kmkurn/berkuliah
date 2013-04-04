<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Forms';
$this->breadcrumbs=array(
	'Buat berkas baru',
);
?>

<div class="page-header">
	<h1>Unggah</h1>
</div>

<div class="row-fluid">
  <div class="span6">
  
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Text fields",
	));
	
?>
<?php
echo(CHtml::beginForm());

echo(CHtml::label('Judul', 'judul'));
echo(CHtml::textField('judul'));

echo(CHtml::endForm());
?>


    </div>
    <div class="span6">
    <?php
    echo(CHtml::label('Fakultas', 'fakultas'));
	echo(CHtml::listBox('fakultas','',array('1'=>'Kedokteran','2'=>'Kedokteran gigi','3'=>'Matematika & IPA','4'=>'Teknik','5'=>'Hukum','6'=>'Ekonomi','7'=>'Ilmu Budaya','8'=>'Psikologi','9'=>'Ilmu sosial & Ilmu Politik','10'=>'Kesehatan Masyarakat','11'=>'Ilmu Komputer','12'=>'Keperawatan','13'=>'Farmasi')));
	
	echo(CHtml::label('Deskripsi', 'name'));
	echo(CHtml::textArea('name','.input-block-level',array('class'=>'input-block-level','rows'=>'3')));
	
	echo(CHtml::label('Pilih Berkas', 'name'));
	echo(CHtml::fileField('name','',array('class'=>'btn')));

	?>
    <?php $this->endWidget();?>
    </div>
</div>

<div class="row-fluid">
  	<div class="span12">
    <?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"atau masukkan teks",
	));
	
	?>
    <?php
	echo(CHtml::textArea('name','.input-block-level',array('class'=>'input-block-level','rows'=>'7')));
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button2',
		'caption'=>'Unggah',
		'value'=>'asd2',
		'htmlOptions'=>array('class'=>'btn btn-info'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	?>
    
    <?php $this->endWidget();?>
    </div>
</div>