<?php
require_once 'inc.php/titolo_sito.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="css/nyroModal.css" type="text/css" media="screen" />
        <title>Contatti | <?php echo $titolo_sito ?></title>
        <meta name="description" content="Informazioni per contattare Punto Casa Tendaggi di Umberto Speranza" />
        <style type="text/css">
          #positive_response{
            display:none;
            position:relative;
            top:-23px;
            left:135px;
            width:130px;
            height:24px;
            background:url('img/ok.gif') no-repeat;
            padding-left:30px
          }
          .nyroModalCont iframe
          {
            width: 800px;
            height: 500px;
          }
        </style>
<?php   require_once 'init.php'; ?>
    <div id="titolo_pagina_corrente">Contatti</div>
    <div id="contenuto">
      <div id="box_info_contatti">
        <div id="tel_fax" class="contatto">
          <div class="categoria_contatto">Telefono e Fax</div>
          <div class="info">081-5174063</div>
        </div>
        <div id="cellulare" class="contatto">
          <div class="categoria_contatto">Cellulare</div>
          <div class="info">3286262875</div>
        </div>
        <div id="mail" class="contatto">
          <div class="categoria_contatto">Email</div>
          <div class="info" style="font-size:16px;">speranzaumberto@libero.it</div>
        </div>
      </div>
    </div>
    <div id="content_form">
      <div class="percorso" style="color:#003366; font-family: 'Reenie Beanie', arial, serif; font-size:30pt; width:65%;">
        Contattaci
      </div>
      <div>
        <form id="formID" action="form_validator/ajax_submit.php" method="get">
          <div class="div_contatti">Nome e Cognome *</div>
          <div class="input_text">
            <input class="validate[required,custom[onlyLetterSp],funcCall[checkin]] testo_input" type="text" id="nome" name="nome" value="Es: Mario" title="Es: Mario" />
          </div>
          <div class="div_contatti">Recapito Telefonico (fisso o cellulare) *</div>
          <div class="input_text">
            <input class="validate[required,custom[italian_phone],funcCall[checkin]] testo_input" type="text" id="telefono" name="telefono" value="Es: 0811234567 o 33912345678" title="Es: 0811234567 o 33912345678" />
          </div>
          <div class="div_contatti">Email *</div>
          <div class="input_text">
            <input class="validate[custom[email],funcCall[checkin]] testo_input" type="text" id="email" name="email" value="Es: miaemail@sito.it" title="Es: miaemail@sito.it" />
          </div>
          <div class="div_contatti">Messaggio *</div>
          <div class="input_text" style="height:105px">
            <textarea class="validate[required,funcCall[checkin]] testo_messaggio" id="messaggio" name="messaggio" title="Scrivere qui il proprio messaggio..." rows="" cols="">Scrivere qui il proprio messaggio...</textarea>
          </div>
          <div style="width:300px; margin-bottom:10px">
            <input class="validate[required,funcCall[checked]]" type="checkbox" id="consenso" name="consenso" style="display:inline;" />
            <span>Autorizzo il trattamento dei dati personali secondo il <a href="note_legali.php" class="nyroModal" target="_blank">D.Lgs 196/2003</a></span>
          </div>
          <input id="invia" class="button" type="submit" value="Invia" />
          <input class="button" type="button" value="Cancella" onclick="reset_field()" />
          <img id="waitgif" src="img/loader-contatti.gif" alt="Attesa risposta" style="display:none;"/>
          <div id="positive_response" class="loghi_contatti">
                  Messaggio inviato
          </div>
        </form>
       </div>
    </div>
    <script src="form_validator/js/language/jquery.validationEngine-it.js" type="text/javascript" charset="utf-8"></script>
    <script src="form_validator/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.nyroModal.custom.js"></script>
    <!--[if IE 6]>
      <script type="text/javascript" src="js/jquery.nyroModal-ie6.min.js"></script>
    <![endif]-->
    <script type="text/javascript" charset="utf-8">
      var nome = $('#nome').val();
      var telefono = $('#telefono').val();
      var email = $('#email').val();
      var messaggio = $('#messaggio').val();
      var consenso = $('#consenso').val();
      $(document).ready(function(){
        $('.nyroModal').nyroModal();
        $("#formID").validationEngine({
          ajaxFormValidation: true,
          onBeforeAjaxFormValidation:waitResponse,
          onAjaxFormComplete: ajaxValidationCallback
        });
      });
      function waitResponse(form, options){
        if (window.console)
          console.log("Attendi...");
        $('#waitgif').show();
        return true;
      }
      function ajaxValidationCallback(status, form, json, options){
        if (status === true) {
          $('#waitgif').hide();
          $('#positive_response').show();
          $('input[type=submit]').attr('disabled', 'disabled');
        }
      }
      function reset_field(){
        $('#nome').val(nome);
        $('#telefono').val(telefono);
        $('#email').val(email);
        $('#messaggio').val(messaggio);
        $('input[type=text]').css({background:'#FFFFFF'});
        $('input[type=text]').parent().css({background:'#FFFFFF'});
        $('input[type=text]').css({color:'#999999'});
        $('.testo_messaggio').css({background:'#FFFFFF'});
        $('.testo_messaggio').parent().css({background:'#FFFFFF'});
        $('.testo_messaggio').css({color:'#999999'});
      }
      function checkin(field, rules, i, options){
        if (field.val() == field.attr('title')) {
          return options.allrules.required.alertText;
        }
      }
      function checked(field, rules, i, options){
        if (!field.attr('checked')) {
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
      function switchTextArea()
      {
        if ($(this).val() == $(this).attr('title'))
        {
          $(this).val('').addClass('testo_messaggio');
          $(this).css({background:'#FFFFCC'});
          $(this).parent().css({background:'#FFFFCC'});
          $(this).css({color:'#000000'});
        }
        else if ($.trim($(this).val()) == '')
        {
          $(this).addClass('testo_messaggio').val($(this).attr('title'));
          $(this).css({background:'#FFFFFF'});
          $(this).parent().css({background:'#FFFFFF'});
          $(this).css({color:'#999999'});
        }
      }
      $('input[type=text][title!=""]').each(function() {
        if ($.trim($(this).val()) == '') $(this).val($(this).attr('title'));
        if ($(this).val() == $(this).attr('title')) $(this).addClass('testo_input');
      }).focus(switchText).blur(switchText);
      $('textarea[title!=""]').each(function() {
        if ($.trim($(this).val()) == '') $(this).val($(this).attr('title'));
        if ($(this).val() == $(this).attr('title')) $(this).addClass('testo_messaggio');
      }).focus(switchTextArea).blur(switchTextArea);
    </script>
<?php  require_once 'finish.php'?>