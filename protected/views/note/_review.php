<?php
/* @var $this NoteController */
/* @var $data Review */

?>

		<table class="table table-hover">

			<tr>
				<td width="150px">
				<?php
				$baseUrl = Yii::app()->baseUrl;
				$photosDir = Yii::app()->params['photosDir'];
				$photo = ($data->student->photo === null) ? 'user.png' : $data->student->photo;
				echo CHtml::image($baseUrl . '/' . $photosDir . $photo, $data->student->name, array('width'=>60));
				?>
				</td>

				<td width="800px">
					<blockquote class="pull-left">
						<p><?php echo Yii::app()->format->wrap(CHtml::encode($data->content), BkFormatter::TEXT_WRAP_LENGTH); ?></p>
					</blockquote>
					<br />
					<blockquote class="pull-right">
						<p><small>Oleh 
						<?php echo CHtml::link(CHtml::encode($data->student->name), array('student/view', 'id'=>$data->student_id)); ?>
						<br />
						<?php echo Yii::app()->format->datetime($data->timestamp); ?></small></p>
					</blockquote>
				</td>
			</tr>

		</table>

