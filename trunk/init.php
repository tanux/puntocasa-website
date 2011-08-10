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
  <meta name="keywords" lang="it" content="puntocasa, punto, casa, tendaggi, tende da sole, tende da interno, arredamenti, veneziane, zanzariere, tempotest, parà, tende nocera inferiore, tende campania, montaggio tende, tappezzeria"/>
  <meta name="author" content="Developer:Esposito Gaetano,Designer:Mario Speranza"/>
  <link rel="shortcut icon" href="img/favicon.gif" type="image/x-icon"/>
  <link rel="stylesheet" href="css/templeate.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/slideshow.css" type="text/css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise&v2&text=PuntoCasTendgiUmbrtSpz' rel='stylesheet' type='text/css' media="screen">
  <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie&text=HomePagerdtCnDvSRuicMpl' rel='stylesheet' type='text/css' media="screen">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js" type="text/javascript"></script>
  <script src="js/slideshow_function.js"></script>
  <script type="text/javascript">
    function targetBlank (url) {
      blankWin = window.open(url,'_blank','menubar=yes,toolbar=yes,location=yes,directories=yes,fullscreen=no,titlebar=yes,hotkeys=yes,status=yes,scrollbars=yes,resizable=yes');
    }
  </script>
</head>
<body>
  <div id="content_all">
    <div class="cornice" id="cornice_up"></div>
    <div class="cornice" id="cornice_center">
      <div id="slideshow">
        <img src="img/slider/image_1.jpg" class="active" alt="Slideshow - Immagine corrente:image_1.jpg" />
        <?php
          foreach ($items as $item){
        ?>
            <img src="img/slider/<?php echo $item?>" alt="Slideshow - Immagine corrente:<?php echo $item?>"/>
        <?php
          }
        ?>
      </div>
     </div>
    <div class="cornice" id="cornice_bottom"></div>
    <div id="logo_header"></div>
    <div id="navigation_menu">
      <a href="index.php">Home Page</a> |
      <a href="prodotti.php">Prodotti</a> |
      <a href="contatti.php">Contatti</a> |
      <a href="dove_siamo.php">Dove Siamo</a>
    </div>
    <div id="text_header">
      <div class="titolo_sito" id="titolo_principale">Punto Casa Tendaggi</div>
      <span class="titolo_sito" id="titolo_secondario">di Umberto Speranza</span>
      <div class="descrizione" style="margin-left:65px">Tende da interno - Tappezzeria - Tende da sole</div>
      <div class="descrizione" style="margin-left:25px;">Zanzariere - Veneziane - Tettoie in legno</div>
    </div>
    <div id="bg_contenuto"></div>
    <div id="foto_centrali"></div>
    <div id="credits_bar">
      <span class="text" style="margin-top:5px;">Punto Casa Tendaggi di Umberto Speranza</span><br />
      <span class="text">Via Roma, 53 - Nocera Inferiore (SA) - P.IVA:555666333</span>
    </div>