<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */

?>

<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title' => '<i class="icon-upload"></i> <strong>UNGGAH BERKAS BARU</strong>'
)); ?>

	<label>Isian dengan tanda * harus diisi.</label>

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'photo-upload-form',
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<table class='table table-hover'>

		<tr>
			<td width="270"><i class="icon icon-tag"></i> <?php echo $form->labelEx($model, 'title'); ?></td>
			<td>
				<?php echo $form->textField($model, 'title', array('maxlength'=>128)); ?>
				<?php echo $form->error($model, 'title'); ?>
			</td>
		</tr>

		<tr>
			<td><i class="icon icon-zoom-in"></i> <?php echo $form->labelEx($model, 'description'); ?></td>
			<td>
				<?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
				<?php echo $form->error($model, 'description'); ?>
			</td>
		</tr>

		<tr>
			<td><i class="icon icon-briefcase"></i> <?php echo $form->labelEx($model, 'faculty_id'); ?></td>
			<td>
				<?php echo $form->dropDownList($model, 'faculty_id',
			       CHtml::listData(Faculty::model()->findAll(), 'id', 'name'),
			       array('prompt' => 'Pilih fakultas',
			             'ajax' => array('type' => 'POST',
			             	             'url' => array('noteUpload/updateCourses'),
			             	             'update' => '#courses',
			             	             'data' => array('faculty_id' => 'js:this.value')
			                           		 ))); ?>
				<?php echo $form->error($model, 'faculty_id'); ?>
			</td>
		</tr>

		<tr>
			<td><i class="icon icon-book"></i> <?php echo $form->labelEx($model, 'course_id'); ?> <label>*</label></td>
			<td>
				<span id="courses">
					<?php echo $form->dropDownList($model, 'course_id', array(), array(
						'prompt' => 'Pilih mata kuliah',
					)); ?>
				</span>
				<?php echo $form->error($model, 'course_id'); ?>
			</td>
		</tr>

		<tr>
			<td><label><em>atau masukkan mata kuliah baru</em></label></td>
			<td><?php echo $form->textField($model, 'new_course_name'); ?></td>
		</tr>

		<tr>
			<td><i class="icon icon-file"></i> <?php echo $form->labelEx($model, 'file'); ?> <label>*</label></td>
			<td>
				<?php echo $form->fileField($model, 'file'); ?>
				<?php echo $form->error($model, 'file'); ?>
			</td>
		</tr>

		<tr>
			<td><label><em>atau ketikkan catatan Anda</em></label></td>
			<td>
				<?php $this->widget('ext.tinymce.ETinyMce', array(
					'model' => $model,
					'attribute' => 'raw_file_text',
					'editorTemplate' => 'full',
					'htmlOptions' => array(
						'class' => 'tinymce',
					),
					'options' => array(
						'mode' => 'exact',
						'theme' => 'advanced',
						'width' => 500,
						'height' => 400,
					),
				)); ?>
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