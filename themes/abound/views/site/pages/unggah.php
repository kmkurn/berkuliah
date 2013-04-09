<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Forms';
$this->breadcrumbs=array(
	'Buat berkas baru',
	);
	?>
	<div class="page-header">
	</div>
	<div class="row-fluid">
		<div id ="rinci">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"Buat Berkas baru"));
				?>

				<?php
				echo"<table class='table table-hover'><tr><td width='270'>";
				echo(CHtml::beginForm());
				echo(CHtml::label('Judul', 'judul'));
				echo"</td><td>";
				echo(CHtml::textField('judul'));
				echo(CHtml::endForm());
				echo"</td></tr>";
				echo"<tr><td width='270'>";
				echo(CHtml::label('Fakultas', 'fakultas'));
				echo"</td><td>";
				echo(CHtml::listBox('fakultas','',array('1'=>'Kedokteran','2'=>'Kedokteran gigi','3'=>'Matematika & IPA','4'=>'Teknik','5'=>'Hukum','6'=>'Ekonomi','7'=>'Ilmu Budaya','8'=>'Psikologi','9'=>'Ilmu sosial & Ilmu Politik','10'=>'Kesehatan Masyarakat','11'=>'Ilmu Komputer','12'=>'Keperawatan','13'=>'Farmasi')));
				echo"</td></tr>";
				echo"<tr><td width='270'>";
				echo(CHtml::label('Deskripsi', 'name'));
				echo"</td><td width='320'>";
				echo(CHtml::textArea('name','',array('class'=>'input-block-level','rows'=>'3')));
				echo"</td></tr>";
				echo"<tr><td width='270'>";
				echo(CHtml::label('Pilih Berkas', 'name'));
				echo"</td><td>";
				echo(CHtml::fileField('name','',array('class'=>'btn')));
				echo"</td></tr>";
				echo"<tr><td width='270'>";
				echo(CHtml::label('Atau masukkan teks', 'opsi'));
				echo"</td><td>";
				
				echo"</td><tr><td></td><td>";
				$this->Beginwidget('zii.widgets.jui.CJuiButton', array(
					'name'=>'button',
					'caption'=>'Unggah',
					'value'=>'asddd',
					'onclick'=>new CJavaScriptExpression('function(){alert("tombol ubah ditekan"); this.blur(); return false;}'),
					));
				$this->endWidget();
				echo "</td></tr></table>";
				?>
				
				<?php $this->endWidget();?>
			</div>
		</div>
	</div>
</div>