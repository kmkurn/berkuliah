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
  <div class="span7">
    <div id="this-carousel-id" class="carousel slide">
      <div class="carousel-inner">

        <div class="item active">
          <a href=""><?php echo CHtml::image(Yii::app()->baseUrl . '/images/header.png','header'); ?></a>
        </div><!-- item active -->

        <div class="item">
          <a href=""><?php echo CHtml::image(Yii::app()->baseUrl . '/images/kemal.png','Kemal Maulana K'); ?></a>
          <div class="carousel-caption">
            <p>Kemal Maulana Kurniawan 1006666040</p>
          </div><!-- carousel-caption -->
        </div><!-- item -->

        <div class="item">
          <a href=""><?php echo CHtml::image(Yii::app()->baseUrl . '/images/ashar.png','Ashar Fuadi'); ?></a>
          <div class="carousel-caption">
            <p>Ashar Fuadi 1006666721</p>
          </div><!-- carousel-caption -->
        </div><!-- item -->

        <div class="item">
          <a href=""><?php echo CHtml::image(Yii::app()->baseUrl . '/images/merci.png','Mercia'); ?></a>
          <div class="carousel-caption">
            <p>Mercia 1006770740</p>
          </div><!-- carousel-caption -->
        </div><!-- item -->

        <div class="item">
          <a href=""><?php echo CHtml::image(Yii::app()->baseUrl . '/images/icha.png',' '); ?></a>
          <div class="carousel-caption">
            <p>Annisa Prida Rachmadianty 1006671192</p>
          </div><!-- carousel-caption -->
        </div><!-- item -->

      </div><!-- .carousel-inner -->
      
      <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>

    </div><!-- .carousel -->

  </div><!-- span7 -->
</div><!-- row-fluid -->
