<?php if (Yii::app()->user->hasFlash('message')): ?>
	<div class="alert alert-<?php echo Yii::app()->user->getFlash('messageType'); ?>">
		<?php echo Yii::app()->user->getFlash('message'); ?>
	</div>
<?php endif; ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-search"></i> <strong>RINCIAN BERKAS</strong>',
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
				<td><i class="icon icon-star"></i> Total Rating</td>
				<td>:</td>
				<td>
				<?php
					$ratingSum = $model->getRatingSum();
					$ratersCount = $model->getRatersCount();

					if ( ! $ratingSum)
						echo 'N/A';
					else
						echo '' . ((double)$ratingSum / $ratersCount) . ' (dari ' . $ratersCount . ' pengguna)'; 
				?>
				</td>
			</tr>
			<tr>
				<td><i class="icon icon-star"></i> Beri Rating</td>
				<td>:</td>
				<td>
				<?php 
					echo CHtml::beginForm();
					$this->widget('CStarRating', array('name'=>'rating', 'value' => $model->getRating(Yii::app()->user->id)));
					echo '&nbsp;&nbsp;';
					echo CHtml::submitButton('Beri', array('class' => 'btn btn-mini'));
					echo CHtml::endForm();
				?>
			    </td>
			</tr>
			<tr>
				<td width='150'></td>
				<td></td>
				<td>
					<?php echo CHtml::link('<i class="icon-search icon-download-alt"></i>Unduh', array('download', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>
					<?php if ($model->student_id === Yii::app()->user->id): ?>
						<?php echo CHtml::link('<i class="icon-search icon-edit"></i>Sunting', array('edit', 'id' => $model->id), array('class' => 'btn btn-success')); ?>
					<?php endif; ?>
					<?php if ($model->student_id === Yii::app()->user->id): ?>
						<?php echo CHtml::link('<i class="icon-search icon-remove"></i>Hapus',
							array('delete', 'id' => $model->id),
							array('class' => 'btn btn-danger',
							'confirm' => 'Apakah Anda yakin ingin menghapus berkas ini?',
						)); ?>
					<?php endif; ?>
					<?php if ($model->student_id === Yii::app()->user->id): ?>
						<?php echo CHtml::link('<i class="icon-search icon-flag"></i> Laporkan Berkas',
							array('', 'id' => $model->id),
							array('class' => 'btn btn-warning',
						)); ?>
					<?php endif; ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget();?>
