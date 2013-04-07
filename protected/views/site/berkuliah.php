<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Selamat datang di <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Ini adalah situs untuk berbagi catatan kuliah dan berkas soal</p>
<div id="artikel">
  <?php
  $this->beginWidget('zii.widgets.CPortlet', array(
    'title'=>"Artikel Pengguna Terbaik",
    ));
  
    ?>
    
    <blockquote class="pull-right">
      <p>Terima kasih berKuliah. Kini berbagi catatan menjadi lebih mudah. </p>
      <p><small>Icha</small><cite title="Source Title">   Januari</cite>
      </p>
      
    </blockquote>
    <p></p>
    <blockquote>
      <p>Dengan berkuliah, tidak bingung lagi untuk mencari soal-soal tahun lalu. </p>
      <p><small>Prida</small><cite title="Source Title">Desember</cite>
      </blockquote>
    </p>
    <p></p>
  </div>  
  <?php $this->endWidget();?>
  <div id="twitter">
    <a class="twitter-timeline" href="https://twitter.com/berkuliah" data-widget-id="320141241616572417">Tweets by @berkuliah</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

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