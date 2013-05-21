<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $downloads CArrayDataProvider */
/* @var $uploads CArrayDataProvider */
/* @var $badges CArrayDataProvider */
/* @var $testimonials CArrayDataProvider */

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
			'title'=>'<i class="icon icon-tasks"></i> <strong>SEJARAH KEGIATAN ' . $model->name . '</strong>',
		)); ?>

			<?php $this->widget('CTabView', array(
				'cssFile' => Yii::app()->baseUrl .'css/abound.css',
				'tabs'=>array(
					'tab1'=>array(
						'title'=>'Sejarah',
						'view'=>'_history',
						'data'=>array(
							'dataProvider'=>$downloads,
						),
					),
					'tab2'=>array(
						'title'=>'Unggahan',
						'view'=>'_uploads',
						'data'=>array(
							'dataProvider'=>$uploads,
						),
					),
					'tab3'=>array(
						'title'=>'Lencana',
						'view'=>'_badges',
						'data'=>array(
							'dataProvider'=>$badges,
						),
					),
					'tab4'=>array(
						'title'=>'Testimonial',
						'view'=>'_testimonials',
						'data'=>array(
							'dataProvider'=>$testimonials,
						),
					),
				),
			)); ?>

		<?php $this->endWidget(); ?>
		
	</div><!-- span9 -->
</div><!-- row-fluid -->