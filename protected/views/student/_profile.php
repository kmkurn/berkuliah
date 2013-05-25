<?php
/* @var $this StudentController */
/* @var $model Student */

?>

	<?php $this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'<i class="icon icon-user"></i> <strong>PROFIL ' .$model->name . '</strong>',
	)); ?>

	<table class="table table-hover">

		<tr align="center">
			<th rowspan="6" width="200px">
				<?php echo CHtml::image(
					Yii::app()->baseUrl . '/' . Yii::app()->params['photosDir'] . Yii::app()->user->profilePhoto,
					CHtml::encode($model->name),
					array('width'=>200)
				); ?>
			</th>
		</tr>

		<tr>
			<td>
				<i class="icon icon-tags"></i> <?php echo $model->getAttributeLabel('username'); ?>
			</td>
			<td>:</td>
			<td><span class="label label-info studentUsername"><?php echo CHtml::encode($model->username); ?></span></td>
		</tr>

		<tr>
			<td>
				<i class="icon icon-user"></i> <?php echo $model->getAttributeLabel('name'); ?>
			</td>
			<td>:</td>
			<td><?php echo CHtml::encode($model->name); ?></td>
		</tr>

		<tr>
			<td>
				<i class="icon icon-book"></i> <?php echo $model->getAttributeLabel('faculty_id'); ?>
			</td>
			<td>:</td>
			<td><?php echo $model->faculty ? CHtml::encode($model->faculty->name) : '<em>(belum dipilih)</em>'; ?></td>
		</tr>

		<tr>
			<td>
				<i class="icon icon-pencil"></i> <?php echo $model->getAttributeLabel('bio'); ?>
			</td>
			<td>:</td>
			<td><?php echo CHtml::encode($model->bio); ?></td>
		</tr>

		<tr>
			<td>
				<i class="icon icon-time"></i> <?php echo $model->getAttributeLabel('last_login_timestamp'); ?>
			</td>
			<td>:</td>
			<td><?php echo Yii::app()->format->datetime($model->last_login_timestamp); ?></td>
		</tr>

	</table>
	
	<?php $this->endWidget(); ?>
	