<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Tentang Kami';
$this->breadcrumbs=array(
	'Tentang Kami',
  );
  ?>
  <div class="page-header">
  </div>
  <div class="row-fluid">
    <div class="span7">
   <div id="this-carousel-id" class="carousel slide">
    <div class="carousel-inner">
      <div class="item active">
        <a href="">  <?php
        echo CHtml::image(Yii::app()->baseUrl . '/images/header.png','alt');
        ?>
      </a>

    </div>
    <div class="item">
      <a href="">
        <?php
        echo CHtml::image(Yii::app()->baseUrl . '/images/kemal.png',' ');
        ?>
      </a>

      <div class="carousel-caption">
        <p>Kemal Maulana Kurniawan 1006666040</p>
      </div>
    </div>
    <div class="item">
     <?php
     echo CHtml::image(Yii::app()->baseUrl . '/images/ashar.png',' ');
     ?>
   </a>
   <div class="carousel-caption">
    <p>Ashar Fuadi 1006666721</p>
  </div>
</div>
<div class="item">
  <?php 
  echo CHtml::image(Yii::app()->baseUrl . '/images/merci.png',' ');
  ?>
</a>
<div class="carousel-caption">
  <p>Mercia 1006770740</p>
</div>
</div>
<div class="item">
 <?php
 echo CHtml::image(Yii::app()->baseUrl . '/images/icha.png',' ');
 ?>
</a>
<div class="carousel-caption">
 <p>Annisa Prida Rachmadianty 1006671192</p>
</div>
</div>

</div><!-- .carousel-inner -->
        <!--  next and previous controls here
        href values must reference the id for this carousel -->
        <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
      </div><!-- .carousel -->
      <!-- end carousel -->
	 <!-- Le javascript
  ================================================== -->
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->

  <!-- Bootstrap jQuery plugins compiled and minified -->
  <script>
  $(document).ready(function(){
   $('.carousel').carousel({
     interval: 2800
   });
 });
  </script>

</div>
</div>
