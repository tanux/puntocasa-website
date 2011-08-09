<?php
$filter = ".jpg";
$directory = "img/slider";
@$d = dir($directory);
if ($d) {
  while($entry=$d->read()) {
    $ps = strpos(strtolower($entry), $filter);
    if (!($ps === false)) {
      $items[] = $entry;
    }
  }
  $d->close();
  sort($items);
}
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="keywords" lang="it" content="puntocasa, punto, casa, tendaggi, tende da sole, tende da interno, arredamenti, veneziane, zanzariere, tempotest, parà, tende nocera inferiore, tende campania, montaggio tende"/>
  <meta name="author" content="Developer:Esposito Gaetano,Design:Mario Speranza"/>
  <link rel="shortcut icon" href="img/favicon.gif" type="image/x-icon"/>
  <link rel="stylesheet" href="css/templeate.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/slideshow.css" type="text/css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise&v2' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css' media="screen">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js" type="text/javascript"></script>
  <script src="js/slideshow_function.js"></script>
  <script type="text/javascript">
    function targetBlank (url) {
      blankWin = window.open(url,'_blank','menubar=yes,toolbar=yes,location=yes,directories=yes,fullscreen=no,titlebar=yes,hotkeys=yes,status=yes,scrollbars=yes,resizable=yes');
    }
  </script>
  <style type="text/css">
    #navigation_menu a{
      text-decoration:none;
      font-style:italic;
    }
    #navigation_menu a:link{
      color:white;
    }
    #navigation_menu a:visited{
      color:white;
    }
    #navigation_menu a:hover{
      color:white;
    }
  </style>

</head>
<body>
  <div id="content_all">
    <div class="cornice" id="cornice_up" style="width:900px; height:24px; background-image:url('img/cornice_up_2.png')"></div>
    <div class="cornice" id="cornice_center" style="width:900px; height:569px; background-image:url('img/cornice_center_2.png'); background-repeat:repeat-y;">
      <div id="slideshow">
        <img src="img/slider/image_1.jpg" class="active" />
        <?php
          foreach ($items as $item){
        ?>
            <img src="img/slider/<?php echo $item?>"/>
        <?php
          }
        ?>
      </div>
     </div>
    <div class="cornice" id="cornice_bottom" style="width:900px; height:24px; background-image:url('img/cornice_bottom_2.png')"></div>
    <div id="logo_header" style="z-index:-1; width:441px; height:179px; background-image:url('img/bg_header.png'); position:absolute; left:442px; top:14px;"></div>
    <div id="navigation_menu" style="-webkit-border-radius: 20px 0px 0px 20px;
                -moz-border-radius: 20px 0px 0px 20px;
                border-radius: 20px 0px 0px 20px;
                background-color:#0b1a5d;
                position:absolute;
                top:195px;
                left:513px;
                height:25px;
                width:370px;
                color:white;
                font-family:verdana;
                font-size:11pt;
                line-height:22px;
                text-align:center;">
      <a href="index.php">Home Page</a> | <a href="prodotti.php">Prodotti</a> | <a href="contatti.php">Contatti</a> | <a href="dove_siamo.php">Dove Siamo</a>
    </div>
    <div id="text_header"style="position:absolute;top:16px; left:445px; color:white; width:435px;">
      <div style="height:43px; font-family: 'Waiting for the Sunrise', cursive; font-size:23pt;margin-left:10px">Punto Casa Tendaggi</div>
      <span style="position:absolute; top:14px; left:255px; font-size:19px; font-family: 'Waiting for the Sunrise', cursive;">di Umberto Speranza</span>
      <div style="margin-top:10px; margin-left:65px">Tende da interno - Tappezzeria - Tende da sole</div>
      <div style="margin-top:10px; margin-left:17px">Zanzariere - Veneziane - Tettoie in legno</div>
    </div>
    <div id="bg_contenuto"style="width:293px; height:456px; background-image:url('img/flower.png'); position:absolute; top:120px; left:589px;z-index:-2; opacity:0.7"></div>
    <div id="foto_centrali" style="z-index:2; width:172px; height:340px; background-image:url('img/foto_centrali.png'); position:absolute; top:215px; left:355px;"></div>
    <div id="credits_bar" style="background-color: #040A25;
                border-top-left-radius: 50px;
                color: white;
                font-family: Verdana;
                font-size: 8pt;
                font-style: italic;
                font-weight: bold;
                height: 40px;
                left: 391px;
                position: absolute;
                text-align: right;
                top: 573px;
                width: 490px;
                z-index: -1;
                border:2px solid white;
                padding-top:5px;
                line-height:15px">
      <span style="margin-top:5px; margin-right:7px">Punto Casa Tendaggi di Umberto Speranza</span><br />
      <span style="margin-right:7px">Via Roma, 53 - Nocera Inferiore (SA) - P.IVA:555666333</span>
    </div>