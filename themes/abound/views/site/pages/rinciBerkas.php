<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Rinci Berkas';
$this->breadcrumbs=array(
  'Rinci Berkas'
  );
  ?>

  <div class="page-header">
  </div>
  <div class="row-fluid">
    <div class="span6">
      <div id="rinci">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
          'title'=>"Halaman rinci berkas",
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
                  $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
                    'name'=>'button1',
                    'caption'=>'Unduh',
                    'value'=>'asd1',
                    'htmlOptions'=>array('class'=>'btn btn-primary'),
                    'onclick'=>new CJavaScriptExpression('function(){alert("tombol unduh ditekan"); this.blur(); return false;}'),
                    ));
                  $this->endWidget();
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

