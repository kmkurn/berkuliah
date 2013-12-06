<?php
/* @var $this Controller */

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle . ' | ' . Yii::app()->name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Berkuliah.com, sarana berbagi catatan dan berkas soal">
    <meta name="author" content="C3-2013">

        <?php
        $baseUrl = Yii::app()->request->baseUrl; 
        $cs = Yii::app()->getClientScript();
        ?>
        <!-- Fav and Touch and touch icons -->
        <link rel="shortcut icon" href="<?php echo $baseUrl;?>/images/icons/logo-berkuliah.png">
        <?php  
        $cs->registerCssFile($baseUrl.'/css/bootstrap-modified.css');
        $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
        $cs->registerCssFile($baseUrl.'/css/abound.css');
        ?>

        <?php $cs->registerCssFile($baseUrl.'/css/style-grey.css'); ?>

        <?php
        $cs->registerScriptFile($baseUrl.'/js/bootstrap.js');
        $cs->registerScriptFile($baseUrl.'/js/to-top.js');
        ?>
  </head>
  <body>
    <section id="navigation-main">   
      <!-- Require the navigation -->
      <?php require_once('tpl_navigation.php'); ?>
    </section><!-- navigation-main -->
    <section class="main-body"><div id="hidecontainerfluid">
      <div class="container-fluid">
      <!-- Include content pages -->
      <?php echo $content; ?>
      </div><!-- container-fluid -->
    </div></section>
    <footer>
        <div class="subnav navbar navbar-fixed-bottom">
            <div class="navbar-inner-footer">
                <div class="container">

                  <div id="footer-left">
                      <?php echo CHtml::link('Ketentuan Layanan', array('site/page', 'view'=>'tos')); ?>
                      <b>&middot;</b>
                      <?php echo CHtml::link('Tentang Kami', array('site/page', 'view'=>'about')); ?>
                  </div>

                  <div id="footer-middle">
                      <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/logo-berkuliah.png','logo', array('width' => '30', 'height'=>'30',));?>
                      <br />
                      <?php echo Yii::powered(); ?>
                  </div>

                  <div id="footer-right">
                      Hak Cipta &copy; <?php echo date('Y'); ?> BerKuliah. Edited by PMPL OKE with permission from former developer.
                  </div>
                 
                </div><!-- container -->

            </div><!-- navbar-inner-footer -->
        </div><!-- subnav navbar navbar-fixed-bottom -->
    </footer>
  </body>
</html>