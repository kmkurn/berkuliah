<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $downloadsDataProvider CActiveDataProvider */
/* @var $uploadsDataProvider CActiveDataProvider */

$this->pageTitle='Dasbor ' . $model->name;

$this->breadcrumbs=array(
	'Dasbor',
);
?>

<div class="page-header"></div>

<div class="row-fluid">
	<div class="span9">
		
		<?php $this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<i class="icon icon-tasks"></i> <strong>SEJARAH KEGIATAN ' . Yii::app()->user->name . '</strong>',
		)); ?>

			<?php $this->widget('CTabView', array(
				'tabs'=>array(
					'tab1'=>array(
						'title'=>'Profil',
						'view'=>'profile',
						'data'=>array(
							'dataProvider'=>$downloadsDataProvider,
						),
					),
					'tab2'=>array(
						'title'=>'Unggahan',
						'view'=>'uploads',
						'data'=>array(
							'dataProvider'=>$uploadsDataProvider,
						),
					),
				),
			)); ?>

		<?php $this->endWidget(); ?>
		
	</div><!-- span9 -->
</div><!-- row-fluid -->