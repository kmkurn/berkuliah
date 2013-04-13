<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<blockquote class="pull-left">
  <p>Ini adalah situs untuk berbagi berkas kuliah dan arsip soal.</p>
      <p><small><cite title="Source Title">BerKuliah</cite></small>
      </p>
</blockquote>
<div class="row-fluid">
  <div class="span9"><table><tr><td width="600px">
    <div id="artikel">
    <?php
      $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => '<strong>Pengguna Terbaik Bulan Ini: dummy.user</strong>',
      ));
    ?>
    <?php echo CHtml::image(Yii::app()->baseUrl . '/images/coming-soon.jpg','Coming soon'); ?>
    <?php $this->endWidget();?>
    </div>
  </td><td>
    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/berkuliah"  data-widget-id="321252419063390209">Tweets by @berkuliah</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</td>
</table>
</div>
</div>
<!--<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
-->