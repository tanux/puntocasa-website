<?php
require_once 'titolo_sito.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <style type="text/css">
    ul{
      list-style-image:url('img/bullet.gif');
    }
    li{
      line-height:30px;
    }
  </style>
  <title>Home Page | <?php echo $titolo_sito ?></title>
  <meta name="description" content="Mappa del sito Punto Casa Tendaggi di Umberto Speranza" />
<?php   require_once 'init.php'; ?>
  <div id="titolo_pagina_corrente">Mappa del Sito</div>
<div id="contenuto" style="text-align:left;">
  <ul>
    <li><a href="index.php">Home Page</a></li>
    <li><a href="prodotti.php">Prodotti</a></li>
    <li><a href="contatti.php">Contatti</a></li>
    <li><a href="dove_siamo.php">Dove Siamo</a></li>
    <li><a href="note_legali.php">Note Legali</a></li>
  </ul>
  </div>
<?php   require_once 'finish.php'; ?>