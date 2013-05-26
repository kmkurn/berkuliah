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
                    Copyright &copy; <?php echo date('Y'); ?> by 
                    <h7><?php echo CHtml::link('Kelompok C3', array('site/page', 'view'=>'about')); ?></h7>.<br/>
                    All Rights Reserved.<br/>
                    <?php echo Yii::powered(); ?>
                    <br />
                </div><!-- container -->
            </div><!-- navbar-inner-footer -->
        </div><!-- subnav navbar navbar-fixed-bottom -->
    </footer>
  </body>
</html>