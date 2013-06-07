	<?php
	/* @var $this SiteController */
	/* @var $model Testimonial */

	?>
		<table class="table">
			<tbody class="penulisArtikel">
				<tr>
				<td>
				<div id="fotoArtikel"> 
					<?php
					$photo = ($model->student->photo === null) ? 'user.png' : $model->student->photo;
					echo CHtml::image(Yii::app()->baseUrl . '/photos/' . $photo, $model->student->name, array('max-width'=>'150','align'=>'left',));
					?>
				</div>
					<p><?php echo $model->content; ?></p>
					<br />
				</td>
			</tr>

			<tr>
				<td>
				<blockquote class="pull-right">
					<p><small>Oleh 
						<?php echo CHtml::link(CHtml::encode($model->student->name), array('student/view', 'id'=>$model->student_id)); ?>
						<br />
						<?php echo Yii::app()->format->datetime($model->timestamp); ?></small></p>
				</blockquote>
				</td>
			</tr></tbody>
		</table>