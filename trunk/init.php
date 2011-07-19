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
  <meta name="keywords" lang="it" content="oculista,specialista,avellino,salvatore,coppola,dottore,oculistica,ottica,oftalmologia,cataratta,occhiali"/>
  <meta name="author" content="Developer:Esposito Gaetano,Design:Mario Speranza"/>
  <link rel="shortcut icon" href="img/favicon.gif" type="image/x-icon"/>
  <link rel="stylesheet" href="css/templeate.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/slideshow.css" type="text/css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise&v2' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css' media="screen">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
  <script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
  <script src="js/slideshow_function.js"></script>

</head>
<body>
  <div id="content_all">
    <div id="cornice_up" style="width:900px; height:57px; background-image:url('img/cornice_up.png')"></div>
    <div id="cornice_center" style="width:900px; height:523px; background-image:url('img/cornice_center.png'); background-repeat:repeat-y;">
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
    <div id="cornice_bottom" style="width:900px; height:42px; background-image:url('img/cornice_bottom.png')"></div>
    <div style="z-index:-1; width:429px; height:174px; background-image:url('img/bg_header.png'); position:absolute; left:442px; top:24px;">
    </div>
    <div style="position:absolute;top:24px; left:445px; color:white">
      <div style="height:43px; font-family: 'Waiting for the Sunrise', cursive; font-size:23pt;margin-left:20px">Punto Casa di Umberto Speranza</div>
      <div style="margin-left:10px">Tende da interno - Tappezzeria - Tende da sole</div>
      <div style="margin-left:150px">Zanzariere - Veneziane - Tettoie in legno</div>
      <em style="margin-left:12px; position:relative; top:10px">Nocera Inferiore (SA) - Via Roma, 55</em>
    </div>
    <div style="width:293px; height:500px; background-image:url('img/flower.png'); position:absolute; top:120px; left:577px;z-index:-2"></div>
    <div style="color:#003366; font-family: 'Reenie Beanie', arial, serif; font-size:30pt; position:absolute; top:170px; left:455px;">Chi Siamo</div>
    <div style="width:172px; height:340px; background-image:url('img/foto_centrali.png'); position:absolute; top:225px; left:355px;"></div>