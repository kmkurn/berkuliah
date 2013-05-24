<?php
/* @var $this HomeController */
/* @var $badge Badge */

?>

<div id="badge-modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><?php echo CHtml::encode($badge->name); ?></h3>
	</div>
	<div class="modal-body">
		<p>Selamat! Anda baru saja mendapatkan lencana <?php echo CHtml::encode($badge->name); ?>!</p>
		<?php echo CHtml::image(Yii::app()->baseUrl . '/' . Yii::app()->params['badgeIconsDir'] . $badge->location, CHtml::encode($badge->name)) ?>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Lanjut</button>
	</div>
</div>