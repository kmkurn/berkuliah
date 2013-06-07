<?php
/* @var $this SiteController */

$this->pageTitle='Tentang Kami';
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
    <div class="content-about">
        
      <ol>
        <li><a href="#about-berkuliah">Tentang BerKuliah</a></li>
        <li><a href="#team">Tim Kami</a></li>
      </ol>
      
    </div>
       <div id="about-berkuliah">
        <h3 class="title-about">Tentang BerKuliah</h3>
        
        <div class="teks-about">
          <p>
              BerKuliah merupakan sebuah sistem informasi untuk berbagi berkas kuliah. Berkas kuliah yang 
              dimaksud dapat berupa catatan materi kuliah maupun arsip soal ujian, baik dalam format PDF, 
              gambar, maupun teks. Aplikasi ini diperuntukkan bagi pemilik akun JUITA (Jaringan UI Terpadu). 
          </p>
          <p>
              Pada umumnya, jika seorang mahasiswa membutuhkan berkas kuliah mahasiswa lain, maka ia akan 
              memfotokopinya. Dengan adanya aplikasi ini, pengguna dapat mengunduh dan mempelajari berkas 
              kuliah yang telah diunggah pengguna lain secara digital. Dengan demikian, diharapkan kertas-kertas 
              fotokopi berkas kuliah yang sering dihasilkan mahasiswa dapat berkurang secara signifikan dan 
              penghematan kertas besar-besaran dapat tercapai. 
          </p>
          <p>
              Melalui aplikasi ini pula, pengguna dapat mencari berkas kuliah yang dibuat pengguna lain dengan 
              cepat dan mudah. Mahasiswa pada umumnya lebih memahami materi kuliah yang diterangkan oleh 
              sesama mahasiwa. Dengan demikian, aplikasi ini dapat membantu pembelajaran para pengguna. 
          </p>
        </div>
        <br />
      </div>
    <!---->
    <br/>
      <div id="team">
        <h3> Tim BerKuliah</h3>
        <div class="developer">
          <div class="team-photo">
            <a href="https://twitter.com/kemaalmaulana"><?php echo CHtml::image(Yii::app()->baseUrl . '/images/kemal2.png','Kemal'); ?></a>
            <h6> Kemal Maulana </h6>
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
        <br />
        <div style="clear:both"></div>
          <h3> Terima kasih kepada: </h3>
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
