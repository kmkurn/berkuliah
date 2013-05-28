<?php
/* @var $this Controller */
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
	
		
		<br />
		<br />
		<?php echo $badge->description; ?>
	</div>
	<div class="modal-footer">
		<?php $idx = 0; ?>
		<?php foreach (Yii::app()->user->getShareMessages() as $msg):
			if ($msg['type'] != 'badge')
			{
				$idx++;
				continue;
			}
		?>
			<?php echo CHtml::link(
				CHtml::image(Yii::app()->request->baseUrl . '/images/facebook.png'),
				'#',
				array('id' => 'fb_share' . $idx)
			); ?>

			<?php echo CHtml::link(
				CHtml::image(Yii::app()->request->baseUrl . '/images/twitter.png'),
				'#',
				array(
					'id' => 'twitter_share' . $idx,
					'data-via' => 'twitterapi',
					'data-lang' => 'en',
				)
			); ?>

		<?php Yii::app()->clientScript->registerScript('fb_share' . $idx, Yii::app()->fbApi->getShareScript('fb_share' . $idx, $msg)); ?>
		<?php Yii::app()->clientScript->registerScript('twitter_share' . $idx, Yii::app()->twitterApi->getShareScript('twitter_share' . $idx, $msg)); ?>
		<?php $idx++; ?>

		<?php endforeach; ?>
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button>
	</div><!-- modal-header -->
</div><!-- badge-modal -->