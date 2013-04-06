<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Rinci Berkas Pemilik';
$this->breadcrumbs=array(
  'Rinci Berkas Pemilik'
);
?>

<div class="page-header">
</div>
<div class="row-fluid">
  <div class="span6">
    <div id="rinci">
  <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
      'title'=>"Halaman rinci berkas pemilik",
    ));
    
  ?>
    <table class="table table-hover">
      
      <tbody width='270'>
        <tr >
          <td width='150'>Judul</td>
          <td>:</td>
          <td width='220'>Least square solutions</td>
        </tr>
        <tr>
          <td>Mata kuliah</td>
          <td>:</td>
          <td>Analisis numerik</td>
        </tr>
        <tr>
          <td>Fakultas</td>
          <td>:</td>
          <td>Ilmu Komputer</td>
        </tr>
        <tr>
          <td>Tanggal unggah</td>
          <td>:</td>
          <td>13-08-2012</td>
        </tr>
        <tr>
          <td>Deskripsi</td>
          <td>:</td>
          <td>abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh abcdefgh </td>
        </tr>
        <tr>
          <td width='150'>
          </td>
          <td>
          </td>
          <td>
              <?php
              $konfirmasi= 'Apakah anda yakin ingin menghapus berkas ini?';
              ?>
              <?php
  $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'button1',
    'caption'=>'Unduh',
    'value'=>'asd1',
    'htmlOptions'=>array('class'=>'btn btn-primary'),
    'onclick'=>new CJavaScriptExpression('function(){alert("tombol unduh ditekan"); this.blur(); return false;}'),
  ));
      $this->endWidget();
      $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'button4',
    'caption'=>'Ubah',
    'value'=>'asd2',
    'htmlOptions'=>array('class'=>'btn btn-success'),
    'onclick'=>new CJavaScriptExpression('function(){alert("tombol ubah ditekan"); this.blur(); return false;}'),
  ));
  $this->endWidget();
  $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'dialogHapus',
    // additional javascript options for the dialog plugin
    'options'=>array(
      'title'=>'Konfirmasi',
      'autoOpen'=>false,
    ),
  ));
    echo $konfirmasi;
    echo "\n";
     $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'button5',
    'caption'=>'ya',
    'value'=>'asd6',
    'onclick'=>new CJavaScriptExpression('function(){alert("tombol ubah ditekan"); this.blur(); return false;}'),
  ));
  $this->endWidget();
      $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'button9',
    'caption'=>'tidak',
    'value'=>'asd8',
    'onclick'=>new CJavaScriptExpression('function(){alert("tombol ubah ditekan"); this.blur(); return false;}'),
  ));
  $this->endWidget();
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
$dialog_button = '<button type="button" class="btn btn-danger" data-loading-text="Loading...">Hapus</button>';
echo CHtml::link($dialog_button, '#', array(
   'onclick'=>'$("#dialogHapus").dialog("open"); return false;',
));
  ?>
         </td>
       </tr>
         <tr>
          <td>Rating</td>
          <td>:</td>
          <td><?php $this->widget('CStarRating',array(
    'name'=>'rating2',
    'value'=>5,
    'readOnly'=>true,
));

?> </td>
        </tr>
        <tr>
          <td>Lapor berkas</td>
          <td>:</td>
          <td>lalala</td>
        </tr>
        <tr>
          <td>Tinjau berkas</td>
          <td>:</td>
          <td><?php
  $this->beginWidget('zii.widgets.CPortlet', array(
    //'title'=>"atau masukkan teks",
  ));
  
  ?>
    <?php

  $this->widget('ext.widgets.xheditor.XHeditor',array(
      'model'=>$model,
      'modelAttribute'=>'content',
      'config'=>array(
          'id'=>'xheditor_1',
          'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
          'skin'=>'default', // default, nostyle, o2007blue, o2007silver, vista
          'width'=>'740px',
          'height'=>'300px',
         // 'loadCSS'=>XHtml::cssUrl('editor.css'),
          'upImgUrl'=>$this->createUrl('request/uploadFile'), // NB! Access restricted by IP        'upImgExt'=>'jpg,jpeg,gif,png',
      ),
  ));
  ?>
    
    <?php $this->endWidget();?>
    </td>
        </tr>
      </tbody>
    </table>
    <?php $this->endWidget();?>
  </div>
  <div class="span6">

  </div>
</div>

