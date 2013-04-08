<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Dasbor';
$this->breadcrumbs=array(
	'Dasbor'
	);
	?>
	<?php
	$sample_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';

	$data = array(
		array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'<span class="badge badge-warning">HTML</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
		array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'<span class="badge badge-important">CSS</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
		array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'<span class="badge badge-info">Javascript</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
		);
	$dataUnggah = array(
		array('id'=>1, 'JudulBerkas'=>'Least Square Solution.pdf', 'MataKuliah'=>'Analisis Numerik', 'Tanggal'=>'10/10/2013','Waktu'=>'22:30'),
		array('id'=>2, 'JudulBerkas'=>'Strassen Algorithm.doc', 'MataKuliah'=>'Desain dan Analisis Algoritma', 'Tanggal'=>'10/10/2013','Waktu'=>'22:30'),
		array('id'=>3, 'JudulBerkas'=>'Strassen Algorithm.doc', 'MataKuliah'=>'Desain dan Analisis Algoritma', 'Tanggal'=>'10/10/2013','Waktu'=>'22:30'),
		array('id'=>4, 'JudulBerkas'=>'Strassen Algorithm.doc', 'MataKuliah'=>'Desain dan Analisis Algoritma', 'Tanggal'=>'10/10/2013','Waktu'=>'22:30'),
		array('id'=>5, 'JudulBerkas'=>'Strassen Algorithm.doc', 'MataKuliah'=>'Desain dan Analisis Algoritma', 'Tanggal'=>'10/10/2013','Waktu'=>'22:30'),
		);
	$gridDataProvider = new CArrayDataProvider($data, array(
		'pagination'=>array(
			'pageSize'=>1,
			)
		));
	$gridDataProviderUnggah = new CArrayDataProvider($dataUnggah, array(
		'pagination'=>array(
			'pageSize'=>1,
			)
		));
	ob_start();
	echo("Sejarah Unggahan");
	$this->widget('zii.widgets.grid.CGridView', array(
		/*'type'=>'striped bordered condensed',*/
		// 'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>$gridDataProvider,
		//'template'=>"{items}",
		'columns'=>array(
			array('name'=>'id', 'header'=>'#'),
			array('name'=>'firstName', 'header'=>'First name'),
			array('name'=>'lastName', 'header'=>'Last name'),
			array('name'=>'language', 'header'=>'Language', 'type'=>'raw'),
			array('name'=>'usage', 'header'=>'Usage', 'type'=>'raw'),
			),
		));
	echo("Sejarah Unduhan");
	$this->widget('zii.widgets.grid.CGridView', array(
		/*'type'=>'striped bordered condensed',*/
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>$gridDataProvider,
		//'template'=>"{items}",
		'columns'=>array(
			array('name'=>'id', 'header'=>'#'),
			array('name'=>'firstName', 'header'=>'First name'),
			array('name'=>'lastName', 'header'=>'Last name'),
			array('name'=>'language', 'header'=>'Language', 'type'=>'raw'),
			array('name'=>'usage', 'header'=>'Usage', 'type'=>'raw'),
			),
		));
	$tableContent=ob_get_contents();
	ob_end_clean();
	ob_start();
	
	$this->widget('zii.widgets.grid.CGridView', array(
		/*'type'=>'striped bordered condensed',*/
		// 'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>$gridDataProviderUnggah,
		//'template'=>"{items}",
	
		'columns'=>array(
			array('name'=>'id', 'header'=>'no.'),
			array('name'=>'JudulBerkas', 'header'=>'Judul Berkas'),
			array('name'=>'MataKuliah', 'header'=>'Mata Kuliah'),
			array('name'=>'Tanggal', 'header'=>'Tanggal'),
			array('name'=>'Waktu', 'header'=>'Waktu'),
			),
		));
	$tableContentUnggah=ob_get_contents();
	ob_end_clean();
	?>
	<div class="page-header">
	</div>
	<div class="row-fluid">
		<div class="span9">
			<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"Dasbor",
				));
				?>
				<?php
				$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs'=>array(
						'Profil'=>$tableContent,
						'Daftar unggahan'=>$tableContentUnggah,
						'Daftar lencana'=>array('content'=>$sample_text, 'id'=>'tab3'),
						),
		// additional javascript options for the tabs plugin
					'options'=>array(
						'collapsible'=>true,
						),
					));
					?>
					<?php $this->endWidget();?>
				</div>
			</div>

