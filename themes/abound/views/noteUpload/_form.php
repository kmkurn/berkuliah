<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => 'Unggah Berkas'
	));
?>

	<?php $form=$this->beginWidget('CActiveForm'); ?>
	<table class='table table-hover'>
		<tr>
			<td width="270"><?php echo $form->labelEx($model, 'title'); ?></td>
			<td><?php echo $form->textField($model, 'title', array('maxlength'=>128)); ?>
				<?php echo $form->error($model, 'title'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model, 'description'); ?></td>
			<td><?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
				<?php echo $form->error($model, 'description'); ?></td>
		</tr>


		<tr>
			<td><?php echo $form->labelEx($model, 'faculty_id'); ?></td>
			<td><?php echo $form->dropDownList($model, 'faculty_id',
			       CHtml::listData(Faculty::model()->findAll(), 'id', 'name'),
			       array('prompt' => 'Pilih fakultas',
			             'ajax' => array('type' => 'POST',
			             	             'url' => array('noteUpload/updateCourses'),
			             	             'update' => '#courses',
			             	             'data' => array('faculty_id' => 'js:this.value')
			                           		 ))); ?>
				<?php echo $form->error($model, 'faculty_id'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model, 'course_id'); ?></td>
			<td><span id="courses"><?php echo $form->dropDownList($model, 'course_id', array(), 
				array('prompt' => 'Pilih mata kuliah')); ?></span>
				<?php echo $form->error($model, 'course_id'); ?></td>
		</tr>

		<tr>
			<td>atau masukkan mata kuliah baru:</td>
			<td><?php echo $form->textField($model, 'new_course_name'); ?></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model, 'file'); ?></td>
			<td><?php echo $form->fileField($model, 'file'); ?>
				<?php echo $form->error($model, 'file'); ?></td>
		</tr>

		<tr>
			<td>atau ketikkan catatan Anda:</td>
			<td><?php echo $form->textArea($model, 'raw_file_text'); ?>
				<?php echo $form->error($model, 'raw_file_text'); ?></td>
		</tr>

		<tr>
			<td></td>
			<td>
			<?php
			$this->beginWidget('zii.widgets.jui.CJuiButton', array(
				'name'=>'uploadButton',
				'buttonType' => 'submit',
				'caption' => 'Unggah',
				'htmlOptions'=> array('class'=>'btn btn-mini btn-primary'),
			));
			$this->endWidget(); ?>
			</td>
		</tr>

	</table>
	<?php $this->endWidget();?>
<?php $this->endWidget();?>