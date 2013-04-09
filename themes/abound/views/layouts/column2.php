<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span3">
		<br />
		<div id="foto">
			<?php echo CHtml::image("assets/url.png",'alt',array("width"=>110,"height"=>110)); ?>
		</div>
		<br />
		<div class="well sidebar-nav">
			<?php
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'items' => array(
					array('label' => '<i class="icon icon-home"></i>Daftar Berkas', 'url' => array('home/index')),
					array('label' => '<i class="icon icon-tasks"></i>Dasbor', 'url' => array('dashboard/index')),
					array('label' => '<i class="icon icon-circle-arrow-up"></i>Unggah Berkas', 'url' => array('noteUpload/index')),
					// array('label' => '<i class="icon icon-comment"></i>Minta Berkas', 'url' => array('/site/page', 'view' => 'interface')),
				)
			)); ?>
		</div>
		<br />
	</div><!-- span3 -->
	<div class="span9">
		<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
			'homeLink' => CHtml::link('Beranda', $this->createUrl('site/index')),
			)); ?><!-- breadcrumbs -->
		<?php endif?>
				
		<!-- Include content pages -->
		<?php echo $content; ?>
	</div><!-- span9 -->
</div><!-- row-fluid -->
<?php $this->endContent(); ?>