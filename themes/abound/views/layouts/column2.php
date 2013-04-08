<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">
	<div class="span3">
		<br/>

		<div id="foto">


			<?php
				echo CHtml::image("assets/url.png",'alt',array("width"=>110,"height"=>110));
			?>
		
		</div><br/>
		<div class="well sidebar-nav">
			<?php
			$this->widget('zii.widgets.CMenu', array(
				/*'type'=>'list',*/
				'encodeLabel'=>false,
				'items'=>array(
					array('visible'=>!Yii::app()->user->isGuest,'label'=>'<i class="icon icon-home"></i>Beranda', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'')),
					array('visible'=>!Yii::app()->user->isGuest,'label'=>'<i class="icon icon-tasks"></i>Dasbor', 'url'=>array('/site/page', 'view'=>'dasbor'),'itemOptions'=>array('class'=>'')),
					array('visible'=>!Yii::app()->user->isGuest,'label'=>'<i class="icon icon-circle-arrow-up"></i>Buat Berkas Baru', 'url'=>array('/site/page', 'view'=>'unggah')),
					array('visible'=>!Yii::app()->user->isGuest,'label'=>'<i class="icon icon-comment"></i>Minta Berkas', 'url'=>array('/site/page', 'view'=>'interface')),
				// Include the operations menu
					array('label'=>'OPERATIONS','items'=>$this->menu),
					),
					));?>
				</div>
				<br>
			</div><!--/span-->
			<div class="span9">
				<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'homeLink'=>CHtml::link('Beranda','/berkuliah/'),
					'htmlOptions'=>array('class'=>'/site/index/')
					)); ?><!-- breadcrumbs -->
				<?php endif?>
				
				<!-- Include content pages -->
				<?php echo $content; ?>
			</div><!--/span-->
		</div><!--/row-->


		<?php $this->endContent(); ?>