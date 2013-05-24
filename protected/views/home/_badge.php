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
		<p>Selamat! Anda baru saja mendapatkan lencana <span class="label label-info"><?php echo CHtml::encode($badge->name); ?></span></p>
		<br />
		<?php echo CHtml::image(
			Yii::app()->baseUrl . '/' . Yii::app()->params['badgeIconsDir'] . $badge->location,
			CHtml::encode($badge->name),
			array('width' => 200, 'style' => 'margin-left: 40px')
		) ?>
	
		<?php $idx = 0; ?>
		<?php foreach (Yii::app()->user->getShareMessages() as $msg):
			if ($msg['type'] != 'badge')
			{
				$idx++;
				continue;
			}
		?>
		<br />
		<br />
		Ceritakan via:
			<?php echo Chtml::link('<i class="icon icon-thumbs-up icon-white"></i> Facebook', '#', array(
				'class' => 'btn btn-info btn-small',
				'id' => 'fb_share' . $idx,
				)); ?>
			<?php echo Chtml::link('<i class="icon icon-edit icon-white"></i> Twitter', '#', array(
				'class' => 'btn btn-info btn-small',
				'id' => 'twitter_share' . $idx,
				'data-via' => 'twitterapi',
				'data-lang' => 'en',
				)); ?>

		<?php Yii::app()->clientScript->registerScript('fb_share' . $idx, Yii::app()->fbApi->getShareScript('fb_share' . $idx, $msg)); ?>
		<?php Yii::app()->clientScript->registerScript('twitter_share' . $idx, Yii::app()->twitterApi->getShareScript('twitter_share' . $idx, $msg)); ?>
		<?php $idx++; ?>

		<?php endforeach; ?>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button>
	</div>
</div>