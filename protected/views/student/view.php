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
		
		<?php $this->renderPartial('_profile', array('model'=>$model)); ?>

		<?php $this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<i class="icon icon-tasks"></i> <strong>SEJARAH KEGIATAN ' . Yii::app()->user->name . '</strong>',
		)); ?>

			<?php $this->widget('CTabView', array(
				'tabs'=>array(
					'tab1'=>array(
						'title'=>'Sejarah',
						'view'=>'_history',
						'data'=>array(
							'dataProvider'=>$downloadsDataProvider,
						),
					),
					'tab2'=>array(
						'title'=>'Unggahan',
						'view'=>'_uploads',
						'data'=>array(
							'dataProvider'=>$uploadsDataProvider,
						),
					),
					'tab3'=>array(
						'title'=>'Testimonial',
						'view'=>'_testimonials',
						'data'=>array(
							'dataProvider'=>$testimonialDataProvider,
						),
					),
				),
			)); ?>

		<?php $this->endWidget(); ?>
		
	</div><!-- span9 -->
</div><!-- row-fluid -->