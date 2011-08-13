<?php
require_once 'inc.php/titolo_sito.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <style type="text/css">
    h1{
      font-size:17px;
    }
    h2{
      font-size:15px;
    }
    #header{
      display:none
    }
    #stampa_button{
      display:none
    }
  </style>
  <title>Note Legali | <?php echo $titolo_sito ?></title>
  <meta name="description" content="Home page del sito Punto Casa Tendaggi di Umberto Speranza" />
<?php   require_once 'init.php'; ?>
  <div id="titolo_pagina_corrente">Note Legali</div>
  <div id="contenuto" style="text-align:left; width:347px; overflow-y:scroll; width:350px; height:260px; left:527px; font-size:14px">
   <?php require_once('inc.php/note_legali.inc.php')?>
  </div>
<?php   require_once 'finish.php'; ?>
