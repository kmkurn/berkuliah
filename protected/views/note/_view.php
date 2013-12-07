<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */

?>

<?php echo Yii::app()->user->getNotification(); ?>

<?php $this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'<i class="icon icon-search"></i> <strong>RINCIAN BERKAS</strong>',
)); ?>

	<table class="table table-hover">
		<tbody>
			<tr>
				<td><i class="icon icon-tag"></i> <?php echo CHtml::encode($model->getAttributeLabel('title')); ?></td>
				<td width='2px'>:</td>
				<td><strong><?php echo Yii::app()->format->wrap(CHtml::encode($model->title), BkFormatter::TITLE_WRAP_LENGTH); ?></strong></td>
			</tr>
			<tr>
				<td><i class="icon icon-user"></i> <?php echo CHtml::encode($model->getAttributeLabel('student_id')); ?></td>
				<td>:</td>
				<td><span class="label label-info studentUsername"><?php echo CHtml::link(CHtml::encode($model->student->name), array('student/view', 'id'=>$model->student->id)); ?></span></td>
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
				<td><?php echo Yii::app()->format->wrap(nl2br(CHtml::encode($model->description)), BkFormatter::TEXT_WRAP_LENGTH); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('upload_timestamp')); ?></td>
				<td>:</td>
				<td><?php echo Yii::app()->format->datetime($model->upload_timestamp); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-time"></i> <?php echo CHtml::encode($model->getAttributeLabel('edit_timestamp')); ?></td>
				<td>:</td>
				<td><?php echo Yii::app()->format->datetime($model->edit_timestamp); ?></td>
			</tr>
			<tr>
				<td><i class="icon icon-star"></i> Total Rating</td>
				<td>:</td>
				<td>
				<?php
					$totalRating = $model->getTotalRating();
					$ratersCount = $model->getRatersCount();

					echo '<span id="total_rating">';
					if ( ! $totalRating)
						echo 'N/A';
					else
						echo '' . ((double)$totalRating / $ratersCount) . ' (dari ' . $ratersCount . ' pengguna)';
					echo '</span>';
				?>
				</td>
			</tr>
			<tr>
				<td><i class="icon icon-star"></i> Beri Rating</td>
				<td>:</td>
				<td>
				<?php 
					$this->widget('CStarRating', array(
							'name'=>'rating',
							'allowEmpty' => false,
							'starCount' => 10,
							'value' => $model->getRating(Yii::app()->user->id),
							'callback' => 'function() {$.ajax({
								type: "POST",
								url: "' . Yii::app()->createUrl('note/rate').'",
								data: "note_id='.$model->id.'&student_id='.Yii::app()->user->id.'&rating=" + $(this).val(),
								success: function(msg) {
									$("#total_rating").html(msg);
								}
							})}'));
				?>
			    </td>
			</tr>
			<!-- Added part from PMPL 2013: unique downloader count START -->
			<tr>
				<td><i class="icon icon-user"></i> Telah diunduh oleh</td>
				<td>:</td>
				<td><span><?php echo $downloadInfoModel->uniqueDownloader($model->id)." pengguna berbeda"; ?></span></td>
			</tr>
			<!-- Added part from PMPL 2013: unique downloader count  END -->
			<tr>
				<td width='150'></td>
				<td></td>
				<td>
					<?php echo CHtml::link('<i class="icon-search icon-download-alt icon-white"></i> Unduh', array('download', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>
					<?php if ($model->student_id === Yii::app()->user->id): ?>
						<?php echo CHtml::link('<i class="icon-search icon-pencil icon-white"></i> Sunting', array('update', 'id' => $model->id), array('class' => 'btn btn-success')); ?>
					<?php endif; ?>
					<?php if (Yii::app()->user->isAdmin || $model->student_id === Yii::app()->user->id): ?>
						<?php echo CHtml::link('<i class="icon-search icon-remove icon-white"></i> Hapus', '#', array(
							'class' => 'btn btn-danger',
							'confirm' => 'Apakah Anda yakin ingin menghapus berkas ini?',
							'submit' => array('delete', 'id'=>$model->id),
						)); ?>
					<?php endif; ?>
					<?php if ($model->student_id !== Yii::app()->user->id): ?>

						<?php if ( ! $model->isReportedBy(Yii::app()->user->id)): ?>
							<?php echo CHtml::link('<i class="icon-search icon-flag icon-white"></i> Laporkan', '#', array(
								'class' => 'btn btn-warning',
								'confirm' => 'Apakah Anda yakin ingin melaporkan berkas ini?',
								'submit' => array('report', 'id'=>$model->id),
							)); ?>
						<?php else : ?>
							<?php echo CHtml::link('<i class="icon-search icon-flag icon-white"></i> Dilaporkan',
								'#',
								array('class' => 'btn btn-warning disabled',
							)); ?>
						<?php endif; ?>

					<?php endif; ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php $this->endWidget();?>
