<?php
/* @var $this DashboardController */
/* @var $downloadsDataProvider CArrayDataProvider */
/* @var $uploadsDataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - Dasbor';

$this->breadcrumbs=array(
	'Dasbor',
);
?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span6">
		<div id="rinci">
		<?php $this->beginWidget('zii.widgets.CPortlet', array(
			'title' => '<i class="icon icon-tasks"></i> <strong>Sejarah Kegiatan ' . Yii::app()->user->name . '</strong>',
		)); ?>

			<?php $this->widget('CTabView', array(
				'tabs' => array(
					'tab1' => array(
						'title' => 'Profil',
						'view' => 'profile',
						'data' => array(
							'downloadsDataProvider' => $downloadsDataProvider,
						),
					),
					'tab2' => array(
						'title' => 'Unggahan',
						'view' => 'uploads',
						'data' => array(
							'dataProvider' => $uploadsDataProvider,
						),
					),
				),
			)); ?>

		<?php $this->endWidget(); ?>
		</div>
	</div><!-- span9 -->
</div><!-- row-fluid -->