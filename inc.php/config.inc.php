<?php

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' ){
  $nomehost = "localhost";
  $nomeuser = "root";
  $password = "20tanux20";
  $nome_db = "puntocasa";
}
elseif ($_SERVER['HTTP_HOST'] == 'www.puntocasasperanza.netsons.org') {
  $nomehost = "mysql.netsons.org";
  $nomeuser = "puntoca2_tanux";
  $password = "20tanux20";
  $nome_db = "puntoca2_puntocasa";
}

