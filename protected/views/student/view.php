<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $downloads CArrayDataProvider */
/* @var $reviews CArrayDataProvider */
/* @var $rates CSqlDataProvider */
/* @var $reports CSqlDataProvider */
/* @var $uploads CArrayDataProvider */
/* @var $badges CArrayDataProvider */
/* @var $testimonials CActiveDataProvider */

$this->pageTitle = $model->username;

$this->breadcrumbs=array(
	$model->username,
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
				'cssFile' => Yii::app()->baseUrl .'/css/tabView.css',
				'tabs'=>array(
					'tab1'=>array(
						'title'=>'Sejarah',
						'view'=>'_history',
						'data'=>array(
							'downloadsDataProvider'=>$downloads,
							'reviewsDataProvider'=>$reviews,
							'ratesDataProvider'=>$rates,
							'reportsDataProvider'=>$reports,
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
						'title'=>'Testimoni',
						'view'=>'_testimonials',
						'data'=>array(
							'dataProvider'=>$testimonials,
						),
					),
				),
			)); ?>
		<?php $this->endWidget(); ?>
	</div>
</div>


