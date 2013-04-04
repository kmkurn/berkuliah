<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand"><small>masuk sebagai Annisa Prida R</small>
	</a>  
          <div class="nav-collapse">
			

			    <?php
			ob_start();
			    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					'id'=>'mydialog',
					// additional javascript options for the dialog plugin
					'options'=>array(
						'title'=>'Unggah Foto',
						'autoOpen'=>false,
					),
				));

			  	echo(CHtml::label('Pilih berkas', 'name'));
				echo(CHtml::fileField('name','',array('class'=>'btn')));

			$this->endWidget('zii.widgets.jui.CJuiDialog');

			// the link that may open the dialog
			$dialog_button = '<button type="button" class="btn btn-primary" data-loading-text="Loading...">Open dialog</button>';
			echo CHtml::link($dialog_button, '#', array(
			   'onclick'=>'$("#mydialog").dialog("open"); return false;',
			));
				?>
			<?php
			
			$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
				'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Beranda', 'url'=>array('/site/index')),
                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'entah', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Buat berkas baru', 'url'=>array('/site/page', 'view'=>'unggah')),
						array('label'=>'Minta berkas', 'url'=>array('/site/page', 'view'=>'interface')),
                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'Akun <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Dasbor <span class="badge badge-warning pull-right">26</span>', 'url'=>array('/site/page', 'view'=>'Dasbor')),
							array('label'=>'Foto <span class="badge badge-important pull-right">112</span>',  'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Cari">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->