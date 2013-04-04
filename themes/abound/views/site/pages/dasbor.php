<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Dasbor';
$this->breadcrumbs=array(
	'Akun','Dasbor'
);
?>
<?php

$sample_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'<span class="badge badge-warning">HTML</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'<span class="badge badge-important">CSS</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'<span class="badge badge-info">Javascript</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
));
ob_start();
$this->widget('zii.widgets.grid.CGridView', array(
		/*'type'=>'striped bordered condensed',*/
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>$gridDataProvider,
		'template'=>"{items}",
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
?>
<div class="page-header">
	<h1>Dasbor</h1>
</div>
<div class="row-fluid">
  <div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Dasbor",
		));
	?>
    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>array(
			'Profil'=>$tableContent,
			'Daftar unggahan'=>$sample_text,
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

