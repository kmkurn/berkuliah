<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Tentang Kami';
$this->breadcrumbs=array(
	'Tentang Kami',
);

Yii::app()->clientScript->registerScript('carousel',
  "$(document).ready(function(){
    $('.carousel').carousel({
      interval: 2800
    });
  });"
);

?>

<div class="page-header"></div>

<div class="row-fluid">
  <div class="span9">
      <div class="team">
        <h3> Tim BerKuliah: </h3>
        <div class="developer">
          <div class="team-photo">
            <a href="https://twitter.com/kemaalmaulana"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/kemal2.png','Kemal'); ?></a>
            <h6> Kemaal Maulana </h6>
            <h6> Project Manager </h6>
          </div>
          <div class="team-photo">
            <a href="https://twitter.com/fushar"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/ashar2.png','Ashar'); ?></a>
            <h6> Ashar Fuadi </h6>
            <h6> Back-End Programmer </h6>
          </div>
          <div class="team-photo">
            <a href="https://twitter.com/annisaprida"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/icha2.png','Annisa'); ?></a>
          <h6> Annisa Prida </h6>
            <h6> Front-End Programmer </h6>
          </div>
          <div class="team-photo">
            <a href="https://twitter.com/mercianov"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/merci2.png','Mercia'); ?></a>
          <h6> Mercia </h6>
            <h6> User Interface Designer </h6>
          </div>
        </div>
        <div style="clear:both"></div>
          <h4> Terima kasih kepada: </h4>
         <div class="thanks-to"> 
          <div class="team-photo">
          <a href="https://twitter.com/bagofair"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/dhika.jpg','Dhika'); ?></a>
            <h6> Dhika Ahmad Aulia </h6>
            <h6> Logo Designer </h6>
          </div>
        </div>
      </div>
        

  </div><!-- span7 -->
</div><!-- row-fluid -->
