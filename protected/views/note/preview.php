    <?php $baseUrl = Yii::app()->request->baseUrl;  ?>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>/flexpaper/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>/flexpaper/js/flexpaper.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>/flexpaper/js/flexpaper_handlers.js"></script>

    <div class="page-header"></div>

    <div class="row-fluid">
      <div class="span9">
        <div id="documentViewer" class="flexpaper_viewer" style="width:100%;height:500px;"></div>
      <p id="back-top">
        <a href="#top"><span></span>Kembali ke atas</a>
      </p>
      </div><!-- span9 -->
    </div><!-- row-fluid -->
    

          <script type="text/javascript">
            function getDocumentUrl(document){
          return "<?php echo $baseUrl ?>/flexpaper/php/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
            }

            function getDocQueryServiceUrl(document){
              return "<?php echo $baseUrl ?>/flexpaper/php/services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
            }

            var startDocument = "<?php echo $model->id ?>.pdf";

              $('#documentViewer').FlexPaperViewer(
         { config : {

             DOC : escape(getDocumentUrl(startDocument)),
             Scale : 0.6,
             ZoomTransition : 'easeOut',
             ZoomTime : 0.5,
             ZoomInterval : 0.2,
             FitPageOnLoad : false,
             FitWidthOnLoad : true,
             FullScreenAsMaxWindow : false,
             ProgressiveLoading : false,
             MinZoomSize : 0.2,
             MaxZoomSize : 5,
             SearchMatchAll : false,
             InitViewMode : 'Portrait',
             RenderingOrder : 'flash,html',

             ViewModeToolsVisible : true,
             ZoomToolsVisible : true,
             NavToolsVisible : true,
             CursorToolsVisible : true,
             SearchToolsVisible : true,

               DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,
             jsDirectory : '<?php echo $baseUrl; ?>/flexpaper/js/',
             localeDirectory : '<?php echo $baseUrl; ?>/flexpaper/locale/',

             JSONDataType : 'jsonp',
             key : '',

               localeChain: 'en_US'

             }}
          );
          </script>
