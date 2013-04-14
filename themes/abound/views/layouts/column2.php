<?php
/* @var $this Controller */
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span3">
		<br />
		<div id="foto">
			<?php echo CHtml::image(Yii::app()->baseUrl . '/photos/' . (Yii::app()->user->getState('photo') === null ? 'user.png' : Yii::app()->user->getState('photo')), 'fotoku', array("width"=>110)); ?>
		</div><!-- foto -->
		<br />
		<div class="well sidebar-nav">
			<?php
			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'items' => array(
					array(
						'label' => '<i class="icon icon-file"></i> <strong>Daftar Berkas</strong>',
						'url' => array('home/index'),
					),
					array(
						'label' => '<i class="icon icon-tasks"></i> <strong>Dasbor</strong>',
						'url' => array('dashboard/index'),
					),
					array(
						'label' => '<i class="icon icon-upload"></i> <strong>Unggah Berkas</strong>',
						'url' => array('noteUpload/index'),
					),
					// array(
					// 	'label' => '<i class="icon icon-comment"></i>Minta Berkas',
					// 	'url' => array('/site/page', 'view' => 'interface'),
					// ),
				),
			)); ?>
		</div><!-- well sidebar-nav -->
		<br />
	</div><!-- span3 -->

	<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
			'homeLink' => CHtml::link('Beranda', $this->createUrl('site/index')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<!-- Include content pages -->
	<?php echo $content; ?>

</div><!-- row-fluid -->

<?php $this->endContent(); ?>