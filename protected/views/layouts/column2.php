<?php
/* @var $this Controller */

if (Yii::app()->user->hasFlash('badge'))
	Yii::app()->clientScript->registerScript('badge', '$("#badge-modal").modal("show");');
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span3">
		<br />
		<?php if (!Yii::app()->user->isGuest): ?>
		<?php $this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>' ', 
			'htmlOptions' => array(
				'style' => 'width: 200px; padding:0'
			)
		)); ?>
		
		<?php if (!Yii::app()->user->isGuest): ?>
			<div id="foto">
				<?php echo CHtml::image(
					Yii::app()->baseUrl . '/' . Yii::app()->params['photosDir'] . 
						(Yii::app()->user->isGuest ? Yii::app()->params['defaultProfilePhoto'] : Yii::app()->user->profilePhoto),
					Yii::app()->user->name, 
					array('width' => 110)
				); ?>
			</div><!-- foto -->
		<?php endif; ?>
		<?php $this->endWidget(); ?>
		<hr style="width:200px" />
		<div class="well sidebar-nav">
			<?php

			$menus = array(
				array(
					'label' => '<i class="icon icon-file"></i> <strong>Daftar Berkas</strong>',
					'url' => array('home/index'),
				),
				array(
					'label' => '<i class="icon icon-upload"></i> <strong>Unggah Berkas</strong>',
					'url' => array('note/upload'),
				),
				array(
					'label' => '<i class="icon icon-tasks"></i> <strong>Dasbor</strong>',
					'url' => array('student/view', 'id'=>Yii::app()->user->id),
				),
			);

			if ( ! Yii::app()->user->isGuest && Yii::app()->user->isAdmin)
			{
				$menus[] = array(
					'label' => '<i class="icon icon-gift"></i> <strong>Beri Hak Testimoni</strong>',
					'url' => array('testimonial/grant'),
				);
			}

			$this->widget('zii.widgets.CMenu', array(
				'encodeLabel' => false,
				'items' => $menus,
			)); ?>
		</div><!-- well sidebar-nav -->
		<br />
		<?php endif; ?>
	</div><!-- span3 -->

	<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
			'homeLink' => CHtml::link('Beranda', $this->createUrl('site/index')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php if (Yii::app()->user->hasFlash('badge')): ?>
	<?php $this->renderPartial('//common/_badge', array('badge'=>Yii::app()->user->getFlash('badge'))); ?>
	<?php endif; ?>

	<!-- Include content pages -->
	<?php echo $content; ?>

</div><!-- row-fluid -->

<?php $this->endContent(); ?>