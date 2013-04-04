<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Selamat datang di <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Ini adalah situs untuk berbagi catatan kuliah dan berkas soal</p>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Artikel Pengguna Terbaik",
	));
	
?>
	
<blockquote class="pull-right">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <p><small>Icha</small><cite title="Source Title">   Januari</cite>
  </p>
  
    </blockquote>
    <p></p>
    <blockquote>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <p><small>Prida</small><cite title="Source Title">Desember</cite>
    </blockquote>
    </p>
<p></p>    
    
    
<?php $this->endWidget();?>
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