<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<blockquote class="pull-left">
  <p>Ini adalah situs untuk berbagi berkas kuliah dan arsip soal.</p>
  <p><small><cite title="Source Title">BerKuliah</cite></small></p>
</blockquote>

<div class="row-fluid">
  <div class="span9">
    <table>

      <tr>
        
        <td width="600px">
          <div id="artikel">

            <?php $this->beginWidget('zii.widgets.CPortlet', array(
              'title' => '<strong>Pengguna Terbaik Bulan Ini: dummy.user</strong>',
            )); ?>

              <?php echo CHtml::image(Yii::app()->baseUrl . '/images/coming-soon.jpg','Coming soon'); ?>

            <?php $this->endWidget();?>

          </div><!-- artikel -->
        </td>

        <td>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/berkuliah" data-widget-id="321252419063390209">Tweets by @berkuliah</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </td>

      </tr>

    </table>
  </div><!-- span9 -->
</div><!-- row-fluid -->