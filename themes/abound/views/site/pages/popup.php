

<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>
      <?php
echo(CHtml::label('Judul', 'name1'));
    echo(CHtml::textField('name1'));
    echo(CHtml::label('Jenis', 'name'));


    $this->widget('zii.widgets.CMenu',array(
   // 'htmlOptions'=>array('class'=>'pull-right nav'),

      'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
      'itemCssClass'=>'item-test',
      'encodeLabel'=>false,
      'items'=>array(
        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
     array('label'=>'Pilih berkas <span class="caret"></span>', 'url'=> '#',
      'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"), 'linkOptions' => array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
     'items'=>array(   
        array('label'=>'PDF','url'=>'#'),
        array('label'=>'Txt','url'=>'#'),
        array('label'=>'JPG','url'=>'#'),
        )))));

    echo(CHtml::label('Fakultas', 'name'));

    $this->widget('zii.widgets.CMenu',array(
   // 'htmlOptions'=>array('class'=>'pull-right nav'),

      'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
      'itemCssClass'=>'item-test',
      'encodeLabel'=>false,
      'items'=>array(
        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
     array('label'=>'Pilih fakultas <span class="caret"></span>', 'url'=> '#',
      'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"), 'linkOptions' => array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
     'items'=>array(   
        array('label'=>'Kedokteran','url'=>'#'),
        array('label'=>'Kedokteran Gigi','url'=>'#'),
        array('label'=>'Matematika & IPA','url'=>'#'),
         array('label'=>'Teknik','url'=>'#'),
        array('label'=>'Hukum','url'=>'#'),
        array('label'=>'Ekonomi','url'=>'#'),
         array('label'=>'Ilmu Budaya','url'=>'#'),
        array('label'=>'Psikologi','url'=>'#'),
        array('label'=>'Ilmu sosial & Ilmu Politik','url'=>'#'),
         array('label'=>'Kesehatan Masyarakat','url'=>'#'),
        array('label'=>'Ilmu Komputer','url'=>'#'),
        array('label'=>'Keperawatan','url'=>'#'),
        array('label'=>'Farmasi','url'=>'#'),
        )))));


      echo(CHtml::label('Mata kuliah', 'name'));

      $this->widget('zii.widgets.CMenu',array(
   // 'htmlOptions'=>array('class'=>'pull-right nav'),
      'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
      'itemCssClass'=>'item-test',
      'encodeLabel'=>false,
      'items'=>array(
        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
     array('label'=>'Pilih mata kuliah <span class="caret"></span>', 'url'=> '#',
      'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"), 'linkOptions' => array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
     'items'=>array(   
        array('label'=>'aa','url'=>'#'),
        array('label'=>'bb','url'=>'#'),
        array('label'=>'cc','url'=>'#'),
        )))));

      echo(CHtml::label('Oleh', 'name'));
      echo(CHtml::textField('name'));
      echo(CHtml::label('Tanggal', 'name'));

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'publishDate',
    // additional javascript options for the date picker plugin
        'options'=>array(
          'showAnim'=>'fold',
          ),
        'htmlOptions'=>array(
          'style'=>'height:20px;',
          'input' =>'placeholder:"Cari";'
          ),
        ));
      $this->Beginwidget('zii.widgets.jui.CJuiButton', array(
        'name'=>'button5',
        'caption'=>'Ok',
        'value'=>'asd6',
        'onclick'=>new CJavaScriptExpression('function(){alert("tombol ubah ditekan"); this.blur(); return false;}'),
        ));
      $this->endWidget();

// the link that may open the dialog
      $dialog_button = '<button type="button" data-loading-text="Loading...">Pencarian mode lanjutan</button>';
      echo CHtml::link($dialog_button, '#', array(
       'onclick'=>'$("#dialogCariLanjutan").dialog("option","position","bottom").dialog("open"); return false;',
       ));
       ?>
    </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    <button class="btn btn-primary">Telusur</button>
  </div>
</div>