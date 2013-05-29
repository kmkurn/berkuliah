<?php
/* @var $this SiteController */
/* @var $model Testimonial */

$this->pageTitle = 'Beranda';

?>

Beranda

<div class="page-header"></div>

<div class="row-fluid">
  <div class="span9">
    <table>

      <tr>
        
        <td width="600px">
          <div id="artikel" class="span12">

            <?php if ($model !== null): ?>

              <?php $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => '<strong>TESTIMONI ' . $model->student->name . '</strong>',
              )); ?>
                <?php $this->renderPartial('_testimonial', array('model'=>$model)); ?>

              <?php $this->endWidget();?>

            <?php else: ?>

              <?php $this->beginWidget('zii.widgets.CPortlet'); ?>

                <?php echo CHtml::image(Yii::app()->baseUrl . '/images/coming-soon.jpg', 'Coming soon'); ?>

              <?php $this->endWidget();?>

            <?php endif; ?>

          </div><!-- artikel -->
        </td>

        <td>
          <?php 

          echo Chtml::link('Tweets by @BerKuliah', 'https://twitter.com/BerKuliah', array(
              'class' => 'twitter-timeline',
              'data-dnt' => 'true',
              'data-widget-id' => '321252419063390209'
              ));

          Yii::app()->clientScript->registerScript('berkuliah-tweets',
            "!function(d,s,id){\n" .
            "  var js,\n" .
            "  fjs=d.getElementsByTagName(s)[0],\n" .
            "  p=/^http:/.test(d.location)?'http':'https';\n" .
            "  if(!d.getElementById(id)){\n" .
            "    js=d.createElement(s);\n" .
            "    js.id=id;\n" .
            "    js.src=p+'://platform.twitter.com/widgets.js';\n" .
            "    fjs.parentNode.insertBefore(js,fjs);\n" .
            "  }\n" .
            "}(document,'script','twitter-wjs');\n"
          );

          ?>
        </td>

      </tr>

    </table>
    <div id="twitter_t"></div>
    <div id="twitter_m">
       <div id="twitter_container">
           <ul id="twitter_update_list"></ul>
       </div>
    </div>
    <div id="twitter_b">
  </div><!-- span9 -->
</div><!-- row-fluid -->