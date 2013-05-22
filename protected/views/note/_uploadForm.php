<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */

?>

<?php echo Yii::app()->user->getNotification(); ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon-upload"></i> <strong>UNGGAH BERKAS BARU</strong>'
)); ?>

	<label>Isian dengan tanda * harus diisi.</label>

	<?php $form = $this->beginWidget('CActiveForm', array(
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'successCssClass' => '',
			'errorCssClass' => 'error',
		),
	)); 

	//echo var_dump($form->clientOptions); die(); 

	?>

	<table class='table table-hover'>

		<?php echo Yii::app()->format->formatInputField($form, 'textField', $model, 'title', 'icon-tag',
			array(
				'maxlength' => 128,
			)
		); ?>
		
		<?php echo Yii::app()->format->formatInputField($form, 'textArea', $model, 'description', 'icon-zoom-in',
			array(
				'rows' => 6,
				'cols' => 50,
			)
		); ?>
		
		<?php echo Yii::app()->format->formatInputField($form, 'dropDownList', $model, 'faculty_id', 'icon-briefcase',
			array(
				'prompt' => 'Pilih fakultas',
				'ajax' => array(
					'type' => 'POST',
			        'url' => array('note/updateCourses'),
			        'update' => '#courses',
			        'data' => array('faculty_id' => 'js:this.value')
			    )
			),
			array(
				'data' => CHtml::listData(Faculty::model()->findAll(), 'id', 'name'),
			)
		); ?>

		<?php echo Yii::app()->format->formatInputField($form, 'dropDownList', $model, 'course_id', 'icon-book',
			array(
				'prompt' => 'Pilih mata kuliah',
			),
			array(
				'data' => array(),
				'beforeInput' => '<span id="courses">',
				'afterInput' => '</span>',
			)
		); ?>

		<tr>
			<td><label><em>atau masukkan mata kuliah baru</em></label></td>
			<td><?php echo $form->textField($model, 'new_course_name'); ?></td>
		</tr>

		<?php echo Yii::app()->format->formatInputField($form, 'fileField', $model, 'file', 'icon-file',
			array(),
			array(
				'hint' => ' (maks ' . Yii::app()->format->size(Note::MAX_FILE_SIZE) . ', PDF/JPEG)',
			)
		); ?>

		<tr>
			<td><label><em>atau ketikkan catatan Anda</em></label></td>
			<td>
				<?php

				Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/tiny_mce/tiny_mce.js');
				Yii::app()->getClientScript()->registerScript('tiny_mce',
					'tinyMCE.init({
						theme: "advanced",
						mode: "exact",
						elements: "Note[raw_file_text]",
						width: "500",
						height: "400",
						relative_urls: false, 
				    	remove_script_host: false
					});'
				);

				?>
				<?php echo $form->textArea($model, 'raw_file_text'); ?>
				<?php echo $form->error($model, 'raw_file_text'); ?>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<?php echo CHtml::button('Unggah', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
				<?php echo CHtml::link('Batal', array('home/index'), array('class' => 'btn')); ?>
			</td>
		</tr>

	</table>

	<?php $this->endWidget();?>

<?php $this->endWidget();?>