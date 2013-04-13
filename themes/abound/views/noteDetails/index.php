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



<div class="row-fluid">
		<?php if (Yii::app()->user->hasFlash('message')): ?>
		<div style="width: 754px; margin-left:292px" class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
			<?php echo Yii::app()->user->getFlash('message'); ?>
		</div>
		<?php endif; ?>
		<div class="span6">
		<div id="rinci">
			<?php $this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<i class="icon icon-search"></i> <strong>RINCIAN CATATAN</strong>',
			)); ?>

			<table class="table table-hover">
				<tbody>
					<tr>
						<td><i class="icon icon-tag"></i> <?php echo CHtml::encode($model->getAttributeLabel('title')); ?></td>
						<td width='2px'>:</td>
						<td><strong><?php echo CHtml::encode($model->title); ?></strong></td>
					</tr>
					<tr>
						<td><i class="icon icon-user"></i> <?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->student->username); ?></td>
					</tr>
					<tr>
						<td><i class="icon icon-briefcase"></i> <?php echo CHtml::encode($model->course->getAttributeLabel('faculty_id')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->course->faculty->name); ?></td>
					</tr>
					<tr>
						<td><i class="icon icon-book"></i> <?php echo CHtml::encode($model->getAttributeLabel('course_id')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->course->name); ?></td>
					</tr>
					<tr>
						<td><i class="icon icon-zoom-in"></i> <?php echo CHtml::encode($model->getAttributeLabel('description')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode($model->description); ?></td>
					</tr>
					<tr>
						<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('upload_timestamp')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->upload_timestamp))); ?></td>
					</tr>
					<tr>
						<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('edit_timestamp')); ?></td>
						<td>:</td>
						<td><?php echo CHtml::encode(strftime('%A, %e %B %Y, %T', strtotime($model->upload_timestamp))); ?></td>
					</tr>
					<tr>
						<td width='150'>
						</td>
						<td>
						</td>
						<td>
						<?php echo CHtml::link('Unduh', array('download', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>
					
						<?php if ($model->student_id === Yii::app()->user->id):
							echo CHtml::link('Sunting', array('edit', 'id' => $model->id), array('class' => 'btn btn-success'));
						endif; ?>

						<?php if ($model->student_id === Yii::app()->user->id):
							echo CHtml::link('Hapus', array('delete', 'id' => $model->id), array('class' => 'btn btn-danger',
																											'confirm' => 'Apakah Anda yakin ingin menghapus berkas ini?'));
						endif; ?>

						</td>
					</tr>
					
				</tbody>
			</table>
			<?php $this->endWidget();?>
		</div>
	</div>
</div>