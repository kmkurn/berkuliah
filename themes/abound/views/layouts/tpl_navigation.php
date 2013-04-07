<div class="navbar navbar-inverse navbar-fixed-top">
	<?php
 echo CHtml::image('assets/header.png',' ');
 ?>
 <div class="navbar-inner"> 
  <div class="container">

    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <!-- Be sure to leave the brand out there if you want it shown -->

  </a>  
  <div class="nav-collapse">

   <?php
   $this->beginWidget('zii.widgets.CMenu',array(
    'htmlOptions'=>array('class'=>'pull-right nav'),
    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
    'itemCssClass'=>'item-test',
    'encodeLabel'=>false,
    'items'=>array(
      /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
      array('visible'=>!Yii::app()->user->isGuest,'label'=>'Akun <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(
         array('label'=>'<i class="icon icon-cog"></i>Pengaturan Foto',  'url'=>array('/site/page', 'view'=>'foto')),
         array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
         )),
      array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
      ),
    ));
   $this->endWidget('zii.widgets.CMenu'); 

   $this->beginWidget('zii.widgets.CMenu',array(
    'htmlOptions'=>array('class'=>'pull-left nav'),
           // 'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
    'itemCssClass'=>'item-test',
    'encodeLabel'=>false,
    'items'=>array(
      /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
      array('visible'=>!Yii::app()->user->isGuest,'label'=>'<i class="icon icon-user icon-white"></i>','url'=>'#'),
      array('visible'=>!Yii::app()->user->isGuest,'label'=>Yii::app()->user->name, 'url'=>'#'),
      ),
    ));
   $this->endWidget('zii.widgets.CMenu');
   ?>

 </div>
</div>
</div>
<div class="style-switcher pull-left">
 <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
 <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
 <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
 <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
 <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
 <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
 <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
</div>
</div>

<div class="subnav navbar navbar-fixed-top">
  <div class="navbar-inner">
   <div class="container">

   </div><!-- container -->
       </div><!-- navbar-inner -->
</div><!-- subnav -->