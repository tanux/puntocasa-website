<?php
require_once 'inc.php/titolo_sito.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href='http://fonts.googleapis.com/css?family=Swanky+and+Moo+Moo' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=The+Girl+Next+Door' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='css/print.css' type='text/css' media="print">
  <link rel="stylesheet" href="css/nyroModal.css" type="text/css" media="screen" />
  <title>Dove Siamo | <?php echo $titolo_sito ?></title>
  <meta name="description" content="Pagina Dove Siamo per Punto Casa Tendaggi" />
  <style type="text/css">
    .nyroModalCont iframe
    {
      width: 800px;
      height: 500px;
    }
  </style>
<?php   require_once 'init.php'; ?>
  <div id="titolo_pagina_corrente">Dove Siamo</div>
  <div id="contenuto">
    <div style="font-size:15px">
      <span>Siamo a Nocera Inferiore (SA), via Roma n°53.</span>
      <br />
      <span>
        All'uscita dell'autostrada A3 Napoli-Salerno, girare a destra,e poi svoltare subito alla prima a sinistra,imboccando il prolungamento.
        Sulla sinistra della strada, c'è un parcheggio: consigliamo di parcheggiare l'auto e procedere a piedi.Alla fine del corso, girare a sinistra.
        e proseguite sul lato sinistro della strada fino alla banca Unicredit: a 100 metri da quest'ultima, trovate Punto Casa.
      </span>
    </div>
  </div>
  <div id="content_form" style="height:375px">
    <div class="percorso" style="color:#003366; font-family: 'Reenie Beanie', arial, serif; font-size:30pt; width:65%;">
      Come raggiungerci
    </div>
    <br />
    <span class="div_contatti percorso">
      Inserisci qui i tuoi dati di provenienza
    </span>
    <br /> <br />
    <form id="dati_provenienza" action="percorso.php" method="post" target="_blank" >
      <input type='hidden' id='fd_stato' value="Italia" name="fd_stato" />
      <div class="div_contatti">Provincia *</div>
      <div class="input_text">
        <input class="validate[required,custom[onlyLetterSp],funcCall[checkin]] testo_input" type="text" id="fd_provincia" name="fd_provincia" value="Es: Salerno" title="Es: Salerno"/>
      </div>
      <div class="div_contatti">Comune *</div>
      <div class="input_text">
        <input class="validate[required,custom[onlyLetterSp],funcCall[checkin]] testo_input" type="text" id="fd_comune" name="fd_comune" value="Es: Nocera Inferiore" title="Es: Nocera Inferiore" />
      </div>
      <div class="div_contatti">Via</div>
      <div class="input_text">
        <input class="testo_input" type="text" id="fd_via" name="fd_via" value="Es: Roma, 53" title="Es: Roma, 53" />
      </div>
      <div id="pulsanti" style="position:relative; left:60px; width:70%">
        <input id="mostra_percorso" type="button" class="button" style="width:125px;" value="Mostra Percorso" />
        <input id="cancella_percorso" class="button" type='button' value='Cancella' style="width:125px;" />
      </div>
    </form>
  </div>
  <script src="form_validator/js/language/jquery.validationEngine-it.js" type="text/javascript" charset="utf-8"></script>
  <script src="form_validator/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="js/jquery.nyroModal.custom.min.js"></script>
  <!--[if IE 6]>
		<script type="text/javascript" src="js/jquery.nyroModal-ie6.min.js"></script>
	<![endif]-->
  <script type="text/javascript" charset="utf-8">
    var provincia = $('#fd_provincia').val();
    var comune    = $('#fd_comune').val();
    var via       = $('#fd_via').val();
    $(document).ready(function(){
      $('#dati_provenienza').validationEngine();
    });
    $('#mostra_percorso').click(function(){
      flag_validazione = $('#dati_provenienza').validationEngine('validate');
      if ( flag_validazione == true ){
        $('#dati_provenienza').addClass('nyroModal').nyroModal();
        $('#dati_provenienza').submit();
      }
    });
    $('#cancella_percorso').click(function(){
      $('#fd_provincia').val(provincia);
      $('#fd_comune').val(comune);
      $('#fd_via').val(via);
      $('input[type=text]').css({background:'#FFFFFF'});
      $('input[type=text]').parent().css({background:'#FFFFFF'});
      $('input[type=text]').css({color:'#999999'});
    });
    function checkin(field, rules, i, options){
      if (field.val() == field.attr('title')) {
        return options.allrules.required.alertText;
      }
    }
    function switchText()
    {
      if ($(this).val() == $(this).attr('title'))
      {
        $(this).val('').addClass('testo_input');
        $(this).css({background:'#FFFFCC'});
        $(this).parent().css({background:'#FFFFCC'});
        $(this).css({color:'#000000'});
      }
      else if ($.trim($(this).val()) == '')
      {
        $(this).addClass('testo_input').val($(this).attr('title'));
        $(this).css({background:'#FFFFFF'});
        $(this).parent().css({background:'#FFFFFF'});
        $(this).css({color:'#999999'});
      }
    }
    $('input[type=text][title!=""]').each(function() {
      if ($.trim($(this).val()) == '') $(this).val($(this).attr('title'));
      if ($(this).val() == $(this).attr('title')) $(this).addClass('testo_input');
    }).focus(switchText).blur(switchText);
    function stampa()
    {
      comune = $("input[name=comune]").val();
      provincia = $("input[name=provincia]").val();
      $('#info_start').html('Partenza da: '+comune+' ('+provincia+')');
      window.print();
    }
  </script>
<?php   require_once 'finish.php'; ?>