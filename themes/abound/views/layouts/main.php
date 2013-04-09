<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Berkuliah.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Berkuliah.com, sarana berbagi catatan dan berkas soal">
    <meta name="author" content="C3-2013">
    <!-- <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'> -->

        <?php
        $baseUrl = Yii::app()->theme->baseUrl; 
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <!-- Fav and Touch and touch icons -->
        <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/logoBerkuliah.png">
        <?php  
        $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
        $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
        $cs->registerCssFile($baseUrl.'/css/abound.css');
        ?>
        <!-- styles for style switcher -->
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/style-blue.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo $baseUrl;?>/css/style-brown.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo $baseUrl;?>/css/style-green.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo $baseUrl;?>/css/style-grey.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo $baseUrl;?>/css/style-orange.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo $baseUrl;?>/css/style-purple.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style7" href="<?php echo $baseUrl;?>/css/style-red.css" />
        <?php
        $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
        $cs->registerScriptFile($baseUrl.'/js/charts.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
        $cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
        ?>
  </head>
  <body>
    <section id="navigation-main">   
      <!-- Require the navigation -->
      <?php require_once('tpl_navigation.php'); ?>
    </section><!-- navigation-main -->
    <section class="main-body">
      <div class="container-fluid">
      <!-- Include content pages -->
      <?php echo $content; ?>
      </div><!-- container-fluid -->
    </section>
    <!-- Require the footer -->
    <?php //require_once('tpl_footer.php'); ?>
    <footer>
        <div class="subnav navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">
                    Copyright &copy; <?php echo date('Y'); ?> by 
                    <h7><?php echo CHtml::link('Kelompok C3', array('page', 'view'=>'tentangKami')); ?></h7>.<br/>
                    All Rights Reserved.<br/>
                    <?php echo Yii::powered(); ?>
                    <br />
                </div>
            </div>
        </div>      
    </footer>
  </body>
</html>