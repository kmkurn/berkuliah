<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Dasbor';
$this->breadcrumbs=array(
	'Akun','Foto'
	);
	?>
	<div class="row-fluid">
		<div class="span9">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"Pengaturan Foto",
				));
				?>
				<?php
				echo"<table class='table table-hover'><tr><td width='150' height='150'>";
				echo CHtml::image("assets/url.png",'alt',array("width"=>200,"height"=>200));
				echo"</td><td>";
				$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					'id'=>'mydialog',
			// additional javascript options for the dialog plugin
					'options'=>array(
						'title'=>'Unggah Foto',
						'autoOpen'=>false,
						),
					));
				$this->endWidget('zii.widgets.jui.CJuiDialog');
				echo(CHtml::label('Pilih berkas', 'name'));
				echo(CHtml::fileField('name','',array('class'=>'btn')));
				$this->endWidget('zii.widgets.CPortlet');
				echo"</td></tr>";
				?>
			</div>
		</div>
