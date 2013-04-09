<?php
/* @var $this NoteController */
/* @var $model Note */

$this->breadcrumbs=array(
	'Daftar Berkas' => array('home/index'),
	$model->title,
);

?>
<div class="page-header">
</div>

<?php if (Yii::app()->user->hasFlash('message')): ?>
<div class="alert alert-success" style="width: 424px">
	<?php echo Yii::app()->user->getFlash('message'); ?>
</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span6">
		<div id="rinci">
			<?php $this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"Halaman Rinci Berkas",
			)); ?>

			<table class="table table-hover">
				<tbody width='270'>
					<tr>
						<td width='150'><?php echo CHtml::encode($model->getAttributeLabel('title')); ?></td>
						<td>:</td>
						<td width='270'><?php echo CHtml::encode($model->title); ?></td>
					</tr>
					<tr>
						<td><?php echo CHtml::encode($model->getAttributeLabel('course_id')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->course->name); ?></td>
					</tr>
					<tr>
						<td><?php echo CHtml::encode($model->course->getAttributeLabel('faculty_id')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->course->faculty->name); ?></td>
					</tr>
					<tr>
						<td><?php echo CHtml::encode($model->getAttributeLabel('upload_timestamp')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->upload_timestamp))); ?></td>
					</tr>
					<tr>
						<td><?php echo CHtml::encode($model->getAttributeLabel('edit_timestamp')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->upload_timestamp))); ?></td>
					</tr>
					<tr>
						<td><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->description); ?></td>
					</tr>
					<tr>
						<td width='150'>
						</td>
						<td>
						</td>
						<td>
						<?php
						$this->beginWidget('zii.widgets.jui.CJuiButton', array(
						'name'=>'downloadButton',
						'buttonType' => 'link',
						'caption'=>'Unduh',
						'htmlOptions'=> array('class'=>'btn btn-mini btn-primary'),
						'url' => array('download', 'id' => $model->id),
						));
						$this->endWidget();
						?>

						<?php if ($model->student_id === Yii::app()->user->id):
						$this->beginWidget('zii.widgets.jui.CJuiButton', array(
						'name'=>'editButton',
						'buttonType' => 'link',
						'caption'=>'Sunting',
						'htmlOptions'=>array('class'=>'btn btn-mini btn-success'),
						'url' => array('edit', 'id' => $model->id),
						));
						$this->endWidget();
						endif; ?>

						<?php if ($model->student_id === Yii::app()->user->id):
						$this->beginWidget('zii.widgets.jui.CJuiButton', array(
						'name'=>'deleteButton',
						'buttonType' => 'link',
						'caption'=>'Hapus',
						'value'=>'asd3',
						'htmlOptions'=>array('class'=>'btn btn-mini btn-danger'),
						'url' => array('delete', 'id' => $model->id),
						'onclick' => new CJavaScriptExpression('function(){return confirm("Apakah Anda yakin ingin menghapus berkas ini?");}'),
						));
						$this->endWidget();
						endif; ?>
						</td>
					</tr>
					<!--
					<tr>
						<td>Rating</td>
						<td>:</td>
						<td>
						<?php $this->widget('CStarRating', array(
						'name'=>'rating2',
						'value'=> 0,
						'readOnly'=> true,
						));

						?>
						</td>
					</tr>
					-->
				</tbody>
			</table>
			<?php $this->endWidget();?>
		</div>
	</div>
</div>