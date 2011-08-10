<?php
require_once 'inc.php/titolo_sito.inc.php';
$fd_stato = $_POST['fd_stato'];
$fd_provincia = $_POST['fd_provincia'];
$fd_comune = $_POST['fd_comune'];
$fd_via = $_POST['fd_via'];
?>
<html>
  <head>
    <title>Stampa del tuo percorso | <?php echo $titolo_sito ?></title>
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/googlemaps.js"></script>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAHfYocY9LRpi1Usy7qamz4BTts2ovKuLAKIfO1bS6J2S9WHa_fhTxp73pW0D0uD3J0l1WE-VHd1e98Q" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready (function(){
        var idMap = 'mappa';
        var idPercorso = 'percorso';
        var latitudineMarker = 40.744622;;
        var longitudineMarker = 14.637975;
        var infoMarker = 'Punto Casa di Umberto Speranza';
        initialize("mappa", "percorso", latitudineMarker, longitudineMarker, infoMarker);
        showDirection();
      });
      function stampa()
      {
        comune = $("input[name=comune]").val();
        provincia = $("input[name=provincia]").val();
        $('#info_start').html('Partenza da: '+comune+' ('+provincia+')');
        window.print();
      }
    </script>
  </head>
  <body>
    <div id="header" style="height:110px;" align="center">
      <span style="font-family:Verdana; font-size:18pt; vertical-align:middle;">Il tuo percorso per raggiungere          </span>
      <img src="img/logo_puntocasa.png" alt="Punto Casa" style="vertical-align:middle;">
    </div>
    <hr />
    <div id="mappa" style="width:500px;height:400px;margin:0 auto; margin-bottom:10px"></div>
    <input type="hidden" id="fd_stato"      value="<?php echo $fd_stato ?>"     name="stato"/>
    <input type="hidden" id="fd_provincia"  value="<?php echo $fd_provincia?>"  name="provincia"/>
    <input type="hidden" id="fd_comune"     value="<?php echo $fd_comune ?>"    name="comune"/>
    <input type="hidden" id="fd_via"        value="<?php echo $fd_via ?>"       name="via"/>
    <div id="percorso" style="width:600px; margin:0 auto;"></div>
    <hr />
    <div id="stampa_button" style="cursor:pointer; position:relative; width:150px; margin:0 auto;" onclick="stampa()">
      <span>Stampa Percorso</span>
      <img src="img/print.png" alt="Logo Stampa" />
    </div>
  </body>
</html>
 
